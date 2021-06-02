<?php

namespace App\Http\Controllers;

use App\Classes\IpedAPI;
use File;

class IpedAPIController extends Controller
{
    private $client;
    private $repository;
    private $featured_courses;

    public function __construct()
    {
        $this->client = new IpedAPI();
        $this->repository = storage_path('app/iped');
        $this->featured_courses = [
            [
                'category_id' => 14,
                'course_id' => 56026,
                'category_slug' => 'informatica',
                'curso' => 'excel-2016',
            ],
            [
                'category_id' => 38,
                'course_id' => 38952,
                'category_slug' => 'fotografia-e-video',
                'curso' => 'fotografia',
            ],
            [
                'category_id' => 13,
                'course_id' => 48535,
                'category_slug' => 'idiomas',
                'curso' => 'ingles-avancado-1',
            ],
            [
                'category_id' => 4,
                'course_id' => 61767,
                'category_slug' => 'publicidade-marketing',
                'curso' => 'marketing-digital',
            ],
            [
                'category_id' => 37,
                'course_id' => 56807,
                'category_slug' => 'culinaria-gastronomia',
                'curso' => 'culinaria-americana',
            ],
            [
                'category_id' => 9,
                'course_id' => 53054,
                'category_slug' => 'estetica-e-beleza',
                'curso' => 'automaquiagem',
            ],
        ];

        if (!File::isDirectory($this->repository)) {
            File::makeDirectory($this->repository, 0755, true, true);
        }
    }

    /**
     * @param string $slug
     * @return array|mixed
     */
    public function get_course_by_slug($slug = '')
    {
        $query = [
            'slug' => $slug,
            'include_topics' => '1',
        ];
        return $this->client->post('/course/get-courses', ['query' => $query]);
    }

    /**
     * @param string $id
     * @return array|mixed
     */
    public function get_course_by_id($id)
    {
        $query = [
            'course_id' => $id,
        ];
        return $this->client->post('/course/get-courses', ['query' => $query]);
    }

    /**
     * @param string $slug
     * @return array|mixed
     */
    public function get_courses_by_category_slug($slug = '')
    {
        return $this->client
            ->post('/course/get-courses', [
                'query' => [
                    'category_slug' => $slug,
                    'include_topics' => '1',
                ],
            ]);
    }

    /**
     * @param string $id
     * @param int|null $type
     * @return array|mixed
     */
    public function get_courses_by_category_id($id, $type = null)
    {
        $query = [
            'category_id' => $id,
            'always_show' => 1,
            'results' => 1000,
        ];

        if ($type) {
            $query['type'] = $type;
        }

        // dd($this->client
        // ->post('/course/get-courses', [
        //     'query' => $query,
        // ]));

        return $this->client
            ->post('/course/get-courses', [
                'query' => $query,
            ]);
    }

    /**
     * @param $rating
     * @return string
     */
    public function get_course_rating($rating)
    {
        $html = '';
        $stars = $rating > 0 ? (int) $rating : 0;
        $diff_star = (int) (($rating - $stars) * 10);
        $half_star = ($diff_star > 0);

        for ($i = 1; $i <= 5; $i++) {
            $class = 'far fa-star';

            if ($i <= $stars) {
                $class = 'fas fa-star';
            } else {
                if ($half_star && $diff_star >= 5) {
                    $half_star = false;
                    $class = 'fas fa-star-half-alt';
                }
            }
            $html .= "<i class='{$class}'></i>";
        }

        return $html;
    }

    /**
     * @param string $slug
     * @return array|mixed
     */
    public function get_category_by_slug($slug = '')
    {
        return $this->client->post('/category/get-categories', ['query' => ['slug' => $slug]]);
    }

    public function user_registration($arrayData)
    {
        return $this->client->post('/user/set-registration', ['query' => $arrayData]);
    }

    /*
    |--------------------------------------------------------------------------
    | Store API results in JSON files
    |--------------------------------------------------------------------------
     */

    public function load_api_files()
    {
        $categorias = $this->get_courses_by_category_slug();
        $array_categorias = [];

        if (isset($categorias->CATEGORIES) && count($categorias->CATEGORIES) > 0) {
            foreach ($categorias->CATEGORIES as $categoria) {
                $array_categorias[] = [
                    'category_title' => $categoria->category_title,
                    'category_slug' => $categoria->category_slug,
                    'category_courses' => count($categoria->category_courses),
                    'category_description' => $categoria->category_description,
                    'category_image' => $categoria->category_image,
                ];
            }
            $keys = array_column($array_categorias, 'category_title');
            array_multisort($keys, SORT_ASC, $array_categorias);
            $this->save_categories_file($array_categorias);
        }

        $this->save_featured_courses();
    }

    public function search_courses($q)
    {
        $query = ['query' => $q];
        return $this->client->post('/course/get-categories-courses', ['query' => $query]);
    }

    public function load_categories_file()
    {
        return json_decode(file_get_contents($this->set_filename('categorias')));
    }

    public function load_featured_courses_file()
    {
        return json_decode(file_get_contents($this->set_filename('cursos_relacionados')));
    }

    public function save_featured_courses()
    {
        $cursos_detaque = [];

        if (count($this->featured_courses) > 0) {
            file_put_contents($this->set_filename('cursos_relacionados'), '');
            foreach ($this->featured_courses as $featured_course) {
                $curso = $this->client->post('/course/get-courses',
                    [
                        'query' => [
                            'category_id' => $featured_course['category_id'],
                            'course_id' => $featured_course['course_id'],
                        ],
                    ]);
                if (count($curso->COURSES) > 0) {
                    $curso->COURSES[0]->category_slug = $featured_course['category_slug'];
                    $curso->COURSES[0]->course_rating_stars = $this->get_course_rating($curso->COURSES[0]->course_rating);
                    $cursos_detaque[] = $curso->COURSES[0];
                }
            }

            file_put_contents(
                $this->set_filename('cursos_relacionados'),
                json_encode($cursos_detaque, FILE_APPEND | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
            );
        }
    }

    private function save_categories_file($data)
    {
        file_put_contents(
            $this->set_filename('categorias'),
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        );
    }

    private function save_course_file($data)
    {
        file_put_contents(
            $this->set_filename($data->category_slug, '/categorias/'),
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        );
    }

    private function set_filename($slug, $path = '/')
    {
        $filename = $this->repository . $path;
        if (!File::isDirectory($filename)) {
            File::makeDirectory($filename, 0755, true, true);
        }
        return $filename . $slug . '.json';
    }
}

<?php
class LTE_Temp
{

    private $content;
    private $title_page = '';

    function __construct()
    {
        // $this->get_menu();

        $ci=&get_instance();
        // print_r2(uri_string());
    }

    function set_title_page($title_page)
    {
        $this->title_page = $title_page;
        return $this;
    }

    function set_content($view_path = '', $data = array())
    {
        $ci = &get_instance();
        $this->content = $ci->load->view($view_path, $data, true);
        return $this;
    }

    function set_content_html($html)
    {
        $ci = &get_instance();
        $this->content = $html;
        return $this;
    }


    function run()
    {
        $ci = &get_instance();

        $data = array();
        $data['content'] = $this->content;
        $data['title_page'] = $this->title_page;
        $data['menu_sidebar'] = $this->get_menu();
        $ci->load->view('template/lte_temp.php', $data);
    }

    function get_menu()
    {
        $ci = &get_instance();
        //url ditulis kecil semua
        $array_menu = array(
            array(
                'name' => 'Dashboard',
                'url' => 'home/',
                'icon' => 'fas fa-tachometer-alt',
            ),

            array(
                'name' => 'Kontak',
                'url' => 'kontak/',
                'icon' => 'fas fa-address-book ',
            ),
            // <i class="far fa-address-book"></i>

            array(
                'name' => 'Managemen User',
                'url' => '#',
                'icon' => 'far fa-circle ',
                'child' => array(
                    array(
                        'name' => 'User',
                        'url' => 'user',
                        'icon' => 'far fa-circle',
                    ),
                    array(
                        'name' => 'Jabatan',
                        'url' => 'jabatan',
                        'icon' => 'far fa-circle',
                    ),
                )
            ),
        );



        return $array_menu;
    }

    function exception_uri()
    {
        //    print_r2(get_uri_arr());

    }
}

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
            array(
                'name' => 'Item',
                'url' => 'item/',
                'icon' => 'fas fa-box ',
            ),

            // <i class="fas fa-shopping-bag"></i>
            // <i class="fas fa-hand-holding-heart"></i>
            // <i class="fas fa-cart-plus"></i>
            // <i class="fas fa-receipt"></i>
            // <i class="fas fa-cart-arrow-down"></i>
            // <i class="far fa-handshake"></i>
            
            array(
                'name' => 'Pembelian',
                'url' => '#',
                'icon' => 'fas fa-shopping-bag ',
                'child' => array(
                    array(
                        'name' => 'Order',
                        'url' => 'pembelian_order/',
                        'icon' => 'fas fa-cart-plus ',
                    ),
                    array(
                        'name' => 'Pembelian',
                        'url' => 'pembelian/',
                        'icon' => 'fas fa-receipt ',
                    ),
                    array(
                        'name' => 'Retur',
                        'url' => 'pembelian_retur/',
                        'icon' => 'far fa-handshake ',
                    ),
                )
            ),
            // <i class="fas fa-hand-holding-usd"></i>
            // <i class="fas fa-comment-dollar"></i>
            // <i class="fas fa-hand-holding-heart"></i>
            // <i class="fas fa-file-invoice-dollar"></i>
            // <i class="fas fa-dollar-sign"></i>
           
            array(
                'name' => 'Penjualan',
                'url' => '#',
                'icon' => 'fas fa-hand-holding-usd ',
                'child' => array(
                    array(
                        'name' => 'Order',
                        'url' => 'penjualan_order/',
                        'icon' => 'fas fa-comment-dollar ',
                    ),
                    array(
                        'name' => 'Penjualan',
                        'url' => 'penjualan/',
                        'icon' => 'fas fa-file-invoice-dollar ',
                    ),
                    array(
                        'name' => 'Retur',
                        'url' => 'penjualan_retur/',
                        'icon' => 'fas fa-hand-holding-heart ',
                    ),
                )
            ),

            array(
                'name' => 'Stok',
                'url' => '#',
                'icon' => 'fas fa-boxes ',
                'child' => array(
                    array(
                        'name' => 'Gudang',
                        'url' => 'gudang/',
                        'icon' => 'fas fa-house-damage ',
                    ),
                    array(
                        'name' => 'Sales',
                        'url' => 'sales/',
                        'icon' => 'fas fa-people-carry ',
                    ),
                    array(
                        'name' => 'Daftar Stok',
                        'url' => 'stock/',
                        'icon' => 'fas fa-paste ',
                    ),
                )
            ),

            // <i class="fas fa-money-bill-alt"></i>
            // <i class="fas fa-wallet"></i>
            // <i class="fas fa-book-open"></i>
            // <i class="fas fa-book"></i>
            array(
                'name' => '  Keuangan',
                'url' => '#',
                'icon' => 'fas fa-money-bill-alt ',
                'child' => array(
                   
                    array(
                        'name' => 'Rekening & E-Wallet',
                        'url' => 'rekening/',
                        'icon' => 'fas fa-wallet ',
                    ),
                    array(
                        'name' => 'Register Keuangan',
                        'url' => 'rekening_reg/',
                        'icon' => 'fas fa-book ',
                    ),
                )
            ),

            // <i class="fas fa-user-cog"></i>
            // <i class="fas fa-users"></i>
            // <i class="fas fa-id-card"></i>
            array(
                'name' => 'Managemen User',
                'url' => '#',
                'icon' => 'fas fa-user-cog ',
                'child' => array(
                    array(
                        'name' => 'User',
                        'url' => 'user',
                        'icon' => 'fas fa-users',
                    ),
                    array(
                        'name' => 'Jabatan',
                        'url' => 'jabatan',
                        'icon' => 'fas fa-id-card',
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

<?php

function pixe_import_files() {
    return array(

        array(
            'import_file_name'             => esc_html__('Main Demo Import' , 'gentium'),
            'import_file_url'              => 'https://www.dropbox.com/s/1ov58efhnbnhkyv/demo.xml?dl=1',
            'import_customizer_file_url'   => 'https://www.dropbox.com/s/4cw4qkka5v3bl1x/customizer-export.dat?dl=1',
            'import_preview_image_url'     => 'https://dl.dropboxusercontent.com/s/002lzghm0j6xi23/main-demo.jpg',
            'preview_url'                  => 'http://gentium.pixerex.com/wp',
        ),

        array(
            'import_file_name'             => esc_html__('Freelancer Demo' , 'nanum'),
            'import_file_url'              => 'https://www.dropbox.com/s/f0day7s1t0ep3xt/demo-freelancer.xml?dl=1',
            'import_customizer_file_url'   => 'https://www.dropbox.com/s/4cw4qkka5v3bl1x/customizer-export.dat?dl=1',
            'import_preview_image_url'     => 'https://dl.dropboxusercontent.com/s/xv9jwe4ontn1pgl/freelancer%20demo.jpg',
            'preview_url'                  => 'http://gentium.pixerex.com/wp/freelancer/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'pixe_import_files' );


if ( ! function_exists( 'pixe_after_import' ) ) :
    function pixe_after_import( $selected_import ) {

       //Set Front page
        $page = get_page_by_title( 'home page');
        $blog = get_page_by_title( 'Our Thinking.');
        update_option( 'page_on_front', $page->ID );
        update_option( 'page_for_posts', $blog->ID );
        update_option( 'show_on_front', 'page' );

    }
    add_action( 'pt-ocdi/after_import', 'pixe_after_import' );
endif;

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

?>

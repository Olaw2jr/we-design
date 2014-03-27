<?php

/** Create the Custom Post Type**/
add_action('init', 'portifolio_manager_register');  
  
 
function portifolio_manager_register() {  
    
    //Arguments to create post type.
    $args = array(  
        'label' => __('Portifolio'),  
        'singular_label' => __('Portifolio'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => true,  
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'portifolios', 'with_front' => false),
       );  
  
    //Register type and custom taxonomy for type.
    register_post_type( 'portifolios' , $args );  
    register_taxonomy("portifolio-type", array("portifolios"), array("hierarchical" => true, "label" => "Portifolio Types", "singular_label" => "Portifolio Type", "rewrite" => true, "slug" => 'portifolio-type')); 
}

add_action("admin_init", "portifolio_manager_add_meta");  
  

function portifolio_manager_add_meta(){  
    add_meta_box("portifolio-meta", "Portifolio Options", "portifolio_manager_meta_options", "portifolios", "normal", "high");   
}  
  

//Create area for extra fields
function portifolio_manager_meta_options(){  
        global $post;  
        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
        
        $custom = get_post_custom($post->ID);
        $website = $custom["website"][0]; 
        $client = $custom["client"][0]; 
?>  

<style type="text/css">
<?php include('business-manager.css'); ?>
</style>

<div class="business_manager_extras">

<?php   
        
    $website= ($website == "") ? "http://" : $website;
?>
    <div><label>Website:</label><input name="website" value="<?php echo $website; ?>" /></div>
    <div><label>Client:</label><input name="client" value="<?php echo $client; ?>" /></div>
</div>   
<?php  
    } 
    
add_action('save_post', 'portifolio_manager_save_extras'); 
  
function portifolio_manager_save_extras(){  
    global $post;  
    
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ //if you remove this the sky will fall on your head.
        return $post_id;
    }else{
        update_post_meta($post->ID, "website", $_POST["website"]); 
        update_post_meta($post->ID, "client", $_POST["client"]);
    } 
}  

add_filter("manage_edit-portifolios_columns", "portifolio_manager_edit_columns");   

function portifolio_manager_edit_columns($columns){
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => "Portifolio Name",
            "description" => "Description",
            "client" => "Client",
            "website" => "Website",
            "cat" => "Category",
        );  

        return $columns;
}  

add_action("manage_portifolios_posts_custom_column",  "portifolio_manager_custom_columns"); 

function portifolio_manager_custom_columns($column){
        global $post;
        $custom = get_post_custom();
        switch ($column)
        {
                        
            case "description":
                the_excerpt();
                break;
            case "client":
                echo $custom["client"][0];
                break;
            case "website":
                echo $custom["website"][0];
                break;
            case "cat":
                echo get_the_term_list($post->ID, 'portifolio-type', '', ', ','');
                break;
        }
}  




?>
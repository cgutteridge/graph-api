<?php
/**
 * @package Engle_Search
 * @version 0.1
 */
/*
Plugin Name: Engle Search
Plugin URI: http://example.org/engle-search
Description: This is a work in progress.
Author: Christopher Gutteridge
Version: 0.1
Author URI: http://totl.net/
*/

require_once( "JRNL_Graph.php" );

add_action( 'wp_ajax_nopriv_graph', 'get_graph' );
function get_graph() {
	# nb email must not be made public
	$g = new JRNL_Graph();
	$g->populateEverything();
	print $g->asJSON();	
	wp_die();
}



/*
// We need some CSS to position the paragraph
add_action( 'wp_head', 'doug_script' );
function doug_script() {
  // This makes sure that the positioning is also good for right-to-left languages
  $x = is_rtl() ? 'left' : 'right';
  $nonce = wp_create_nonce( 'helloworld' );
  $ajaxURL = get_site_url(null,"wp-admin/admin-ajax.php");
?>
<script type='text/javascript'>
jQuery(document).ready( function() {
  var showing_search = false;
  var popup = jQuery( "<div class='doug_mode'></div>" );
  var table = jQuery( "<table></table>" );
  var tr = jQuery( "<tr></tr>" );
  var all = jQuery( "<select><option value='all' selected='selected'>ALL</option></select>" );
  var type = jQuery( "<select><option value='posts' selected='selected'>POSTS</option></select>" );
  var rel = jQuery( "<select><option value='containing' selected='selected'>CONTAINING</option></select>" );
  var term = jQuery( "<input class='doug_query_input' placeholder='search term' />" );
  var output = jQuery( "<div class='doug_query_output'></div>" );
  var loading = jQuery( "<div class='doug_query_loading'>LOADING</div>" );

  table.append( tr );
  var td1 = jQuery( '<td></td>' );  
  td1.append( all );
  tr.append( td1 );
  var td2 = jQuery( '<td></td>' );  
  td2.append( type );
  tr.append( td2 );
  var td3 = jQuery( '<td></td>' );  
  td3.append( rel );
  tr.append( td3 );
  var td4 = jQuery( '<td style="width:100%"></td>' );  
  td4.append( term );
  tr.append( td4 );
  popup.append( table );
  popup.append( output );
  popup.append( loading );
  output.hide();
  popup.hide();
  jQuery( "body" ).append( popup );
  jQuery( "body" ).keypress(function( event ) {
    if( event.ctrlKey && event.key==' ' && !showing_search ) {
      showing_search = true;
      popup.show();
      term.val = "";
      term.focus();
      return false;
    }
    if( event.keyCode == 27 && showing_search ) {
      popup.hide();
      showing_search = false;
      return false;
    }

    return true;
  });
  jQuery.ajax({
    type: "post",url: '<?php echo $ajaxURL; ?>',data: { action: 'gethello', _ajax_nonce: '<?php echo $nonce; ?>' },
    beforeSend: function() {
      jQuery("#loading").show("slow");
    }, //show loading just when link is clicked
    complete: function() { 
      jQuery("#loading").hide("fast"); 
    }, //stop showing loading when the process is complete
    success: function(html){ //so, if data is retrieved, store it in html
      output.html(html); //show the html inside helloworld div
      output.show("slow"); //animation
    }
  }); //close jQuery.ajax(

});
</script>
<style type="text/css">
.doug_mode { 
  position: fixed;
  top: 20%;
  left: 10%;
  width: 80%;
  background-color: #fff;
  border: solid 2px black;
  text-align: center;
  padding: 1%;
  z-index: 10;
  box-shadow: 12px 12px 2px 1px rgba(0, 0, 0, .5);
}
.doug_query_input {
  width: 100%;
  border: solid 1px #ccc;
  font-size: 120%;
  padding: 5px 10px;
}

</style>
<?php
}
*/

/*
add_action( 'wp_ajax_gethello', 'get_hello_ajax' );
function get_hello_ajax() {
	//check_ajax_referer( "helloworld" );
	?>Hello World!<?php
	die();
}
*/

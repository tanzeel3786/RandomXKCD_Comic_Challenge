<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Bootstrap 4 Login Form</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>
    <div style="text-align:center;">
<h1>after five minute resend data!</h1>

<span id="timer"></span></div>
    <?php 
		session_start();
		
		
	
		
		$k=rand(14,100);
		
        include('RegisterController.php');
        $arr= file_get_contents("https://xkcd.com/$k/info.0.json");
        $p=json_decode($arr,TRUE);
        print_r($p);
        $mg='images/found.jpg';
        $url=$p['img'];
        file_put_contents($mg,file_get_contents($url));
        $s=$obj->Allitem($con);
        
       
$msg="xyz";


    ?>
        <div class="container">

<h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>SrNo</th>
        <th>comics</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
        <?php for ($i=0; $i <count($s) ; $i++) { 
		
		
		$email=$s[$i]['user_email'];
		$comics=$p['img'];
            $obj->sendcomics($email,$msg,$comics);
            # code...
        ?>
      <tr>
        <td><?php echo $i+1;?></td>
        <td>  <img src="<?php echo $p['img'];?>" alt="Girl in a jacket" width="100" height="100"></td>
        <td><?php echo $s[$i]['user_email'];?></td>
      </tr>
  <?php }?>
      
    </tbody>
  </table>



        
    </div>
</body>
</html>

<script type="text/javascript">
var count = 300;
var redirect = "sendimg.php";
function countDown(){
    var timer = document.getElementById("timer");
    if(count > 0){
        count--;
        timer.innerHTML = "This page will redirect in "+count+" seconds.";
        setTimeout("countDown()", 1000);
}else{
        window.location.href = redirect;
    }
}
countDown();
</script>
<script type="text/javascript">
    


    var fakewaffle = ( function ( $, fakewaffle ) {
    'use strict';

    fakewaffle.responsiveTabs = function ( collapseDisplayed ) {

        fakewaffle.currentPosition = 'tabs';

        var tabGroups = $( '.nav-tabs.responsive' );
        var hidden    = '';
        var visible   = '';
        var activeTab = '';

        if ( collapseDisplayed === undefined ) {
            collapseDisplayed = [ 'xs', 'sm' ];
        }

        $.each( collapseDisplayed, function () {
            hidden  += ' hidden-' + this;
            visible += ' visible-' + this;
        } );

        $.each( tabGroups, function ( index ) {
            var collapseDiv;
            var $tabGroup = $( this );
            var tabs      = $tabGroup.find( 'li a' );

            if ( $tabGroup.attr( 'id' ) === undefined ) {
                $tabGroup.attr( 'id', 'tabs-' + index );
            }

            collapseDiv = $( '<div></div>', {
                'class' : 'panel-group responsive' + visible,
                'id'    : 'collapse-' + $tabGroup.attr( 'id' )
            } );

            $.each( tabs, function () {
                var $this          = $( this );
                var oldLinkClass   = $this.attr( 'class' ) === undefined ? '' : $this.attr( 'class' );
                var newLinkClass   = 'accordion-toggle';
                var oldParentClass = $this.parent().attr( 'class' ) === undefined ? '' : $this.parent().attr( 'class' );
                var newParentClass = 'panel panel-default';
                var newHash        = $this.get( 0 ).hash.replace( '#', 'collapse-' );

                if ( oldLinkClass.length > 0 ) {
                    newLinkClass += ' ' + oldLinkClass;
                }

                if ( oldParentClass.length > 0 ) {
                    oldParentClass = oldParentClass.replace( /\bactive\b/g, '' );
                    newParentClass += ' ' + oldParentClass;
                    newParentClass = newParentClass.replace( /\s{2,}/g, ' ' );
                    newParentClass = newParentClass.replace( /^\s+|\s+$/g, '' );
                }

                if ( $this.parent().hasClass( 'active' ) ) {
                    activeTab = '#' + newHash;
                }

                collapseDiv.append(
                    $( '<div>' ).attr( 'class', newParentClass ).html(
                        $( '<div>' ).attr( 'class', 'panel-heading' ).html(
                            $( '<h4>' ).attr( 'class', 'panel-title' ).html(
                                $( '<a>', {
                                    'class'       : newLinkClass,
                                    'data-toggle' : 'collapse',
                                    'data-parent' : '#collapse-' + $tabGroup.attr( 'id' ),
                                    'href'        : '#' + newHash,
                                    'html'        : $this.html()
                                } )
                            )
                        )
                    ).append(
                        $( '<div>', {
                            'id'    : newHash,
                            'class' : 'panel-collapse collapse'
                        } )
                    )
                );
            } );

            $tabGroup.next().after( collapseDiv );
            $tabGroup.addClass( hidden );
            $( '.tab-content.responsive' ).addClass( hidden );

            if ( activeTab ) {
                $( activeTab ).collapse( 'show' );
            }
        } );

        fakewaffle.checkResize();
        fakewaffle.bindTabToCollapse();
    };

    fakewaffle.checkResize = function () {

        if ( $( '.panel-group.responsive' ).is( ':visible' ) === true && fakewaffle.currentPosition === 'tabs' ) {
            fakewaffle.tabToPanel();
            fakewaffle.currentPosition = 'panel';
        } else if ( $( '.panel-group.responsive' ).is( ':visible' ) === false && fakewaffle.currentPosition === 'panel' ) {
            fakewaffle.panelToTab();
            fakewaffle.currentPosition = 'tabs';
        }

    };

    fakewaffle.tabToPanel = function () {

        var tabGroups = $( '.nav-tabs.responsive' );

        $.each( tabGroups, function ( index, tabGroup ) {

            // Find the tab
            var tabContents = $( tabGroup ).next( '.tab-content' ).find( '.tab-pane' );

            $.each( tabContents, function ( index, tabContent ) {
                // Find the id to move the element to
                var destinationId = $( tabContent ).attr( 'id' ).replace ( /^/, '#collapse-' );

                // Convert tab to panel and move to destination
                $( tabContent )
                    .removeClass( 'tab-pane' )
                    .addClass( 'panel-body fw-previous-tab-pane' )
                    .appendTo( $( destinationId ) );

            } );

        } );

    };

    fakewaffle.panelToTab = function () {

        var panelGroups = $( '.panel-group.responsive' );

        $.each( panelGroups, function ( index, panelGroup ) {

            var destinationId = $( panelGroup ).attr( 'id' ).replace( 'collapse-', '#' );
            var destination   = $( destinationId ).next( '.tab-content' )[ 0 ];

            // Find the panel contents
            var panelContents = $( panelGroup ).find( '.panel-body.fw-previous-tab-pane' );

            // Convert to tab and move to destination
            panelContents
                .removeClass( 'panel-body fw-previous-tab-pane' )
                .addClass( 'tab-pane' )
                .appendTo( $( destination ) );

        } );

    };

    fakewaffle.bindTabToCollapse = function () {

        var tabs     = $( '.nav-tabs.responsive' ).find( 'li a' );
        var collapse = $( '.panel-group.responsive' ).find( '.panel-collapse' );

        // Toggle the panels when the associated tab is toggled
        tabs.on( 'shown.bs.tab', function ( e ) {

            if (fakewaffle.currentPosition === 'tabs') {
                var $current  = $( e.currentTarget.hash.replace( /#/, '#collapse-' ) );
                $current.collapse( 'show' );

                if ( e.relatedTarget ) {
                    var $previous = $( e.relatedTarget.hash.replace( /#/, '#collapse-' ) );
                    $previous.collapse( 'hide' );
                }
            }

        } );

        // Toggle the tab when the associated panel is toggled
        collapse.on( 'shown.bs.collapse', function ( e ) {

            if (fakewaffle.currentPosition === 'panel') {
                // Activate current tabs
                var current = $( e.target ).context.id.replace( /collapse-/g, '#' );
                $( 'a[href="' + current + '"]' ).tab( 'show' );

                // Update the content with active
                var panelGroup = $( e.currentTarget ).closest( '.panel-group.responsive' );
                $( panelGroup ).find( '.panel-body' ).removeClass( 'active' );
                $( e.currentTarget ).find( '.panel-body' ).addClass( 'active' );
            }

        } );
    };

    $( window ).resize( function () {
        fakewaffle.checkResize();
    } );

    return fakewaffle;
}( window.jQuery, fakewaffle || { } ) );

</script>

  





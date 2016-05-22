<script>
// Drawing the "Paper"
(function() {
var cvs = Snap("#cvs");
var x1 = 60;
var x2 = 180;
var x3 = 300;
var y = 150;
isGreenClicked = false;
isYellowClicked = false;
isRedClicked = false;
/*****************************************************************************************************************/
    // Create the first circle on the left
    var el1 = cvs.ellipse(x1, y, 50, 50);
    // styling the circle 
    el1.attr({fill: '#237529', opacity:'.8', stroke: 'black', strokeWidth: '1px'});
    // creates the text for the first svg and then sets the attributes for the text
    var t1 = cvs.text(31, 160 , "Empty");
    t1.attr({pointerEvents:'none', fontSize: '21', fontFamily: 'Open+Sans'});
    
    // Add a hover event for the first svg
    el1.hover(
      function(e) { this.animate({fill:'forestgreen', opacity:'1', rx:'55', ry:'55'}, 500, mina.bounce); },
      function(e) { this.animate({fill:'#237529', opacity:'.8', rx:'50', ry:'50'}, 500, mina.bounce); }
    );
    // allows the svg to be clickable and go to the specified url
    el1.click(
        function(e) {
            //update the green counter
            if(isGreenClicked === false && isYellowClicked === false && isRedClicked === false){
            $.ajax({
                method: "POST",
                url: "greenvote.php?id=<?php echo $_GET['id']?>",
                dataType: "json"
            }).done(function( json ) {
              isGreenClicked = true;
              window.location = "findLocation.php"
            });            
            
            }
            if(isGreenClicked === true){
            setInterval(function() {
            //allow user to click button once per ten minutes
                        isGreenClicked = false;

            }, 10000);
          }
 
          }
      );
/*****************************************************************************************************************/
     // Create the second circle in the middle
    var el2 = cvs.ellipse(x2, y, 50, 50);
     // styling the circle 
    el2.attr({fill: 'gold', opacity:'.8', stroke: 'black', strokeWidth: '1px'});
     // creates the text for the second svg and then sets the attributes for the text 
    var t2 = cvs.text(135, 160 , "Moderate");
    t2.attr({pointerEvents:'none', fontSize: '21', fontFamily: 'Open+Sans'});

    // Add a hover event for the second svg
    el2.hover(
      function(e) { this.animate({fill:'yellow', opacity:'1', rx:'55', ry:'55', strokeWidth: '1px'}, 500, mina.bounce); },
      function(e) { this.animate({fill:'gold', opacity:'.8', rx:'50', ry:'50', strokeWidth: '1px'}, 500, mina.bounce); }
    );
    // allows the svg to be clickable and go to the specified url
    el2.click(
        function(e) {
          //update the yellow counter
          if(isGreenClicked === false && isYellowClicked === false && isRedClicked === false){
 $.ajax({
                method: "POST",
                url: "yellowvote.php?id=<?php echo $_GET['id']?>",
                dataType: "json"
            }).done(function( json ) {
              window.location = "findLocation.php"
            })                          
            isYellowClicked = true;
            }
            if(isYellowClicked === true){
            setInterval(function() {
            //allow user to click button once per ten minutes
                        isYellowClicked = false;

            }, 10000);
          }
        }
      );
/*****************************************************************************************************************/
     // Creat the third circle on the right.
    var el3 = cvs.ellipse(x3, y, 50, 50);
     // styling the circle 
    el3.attr({fill: '#d31518', opacity:'.8', stroke: 'black', strokeWidth: '1px'});
     // creates the text for the third svg and then sets the attributes for the text
    var t3 = cvs.text(277, 160 , "Busy");
    t3.attr({pointerEvents:'none', fontSize: '21', fontFamily: 'Open+Sans'});

    // Add a hover event for the third svg
    el3.hover(
      function(e) { this.animate({fill:'red', opacity:'1',rx:'55', ry:'55'}, 500, mina.bounce); },
      function(e) { this.animate({fill:'#d31518', opacity:'.8', rx:'50', ry:'50'}, 500, mina.bounce); }
    );
    // allows the svg to be clickable and go to the specified url
el3.click(
        function(e) {
            //update the red counter
              if(isGreenClicked === false && isYellowClicked === false && isRedClicked === false){
                $.ajax({
                method: "POST",
                url: "redvote.php?id=<?php echo $_GET['id']?>",
                dataType: "json"
            }).done(function( json ) {
              window.location = "findLocation.php"
            })                         
             isRedClicked = true;
            }
            if(isRedClicked === true){
            setInterval(function() {
            //allow user to click button once per ten minutes
                        isRedClicked = false;

            }, 10000);
          }
        }
      );

})();
</script>
  

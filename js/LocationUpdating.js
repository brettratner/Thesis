/**************************************************************************
* Lab06
* Brett Ratner
* The purpose of this assignment is to use Scalable Vector Graphics(SVG)
* that will change in animation when they are hovered over and when they 
* are cliked it will take you to that certain url.
***************************************************************************/
// Drawing the "Paper"
(function() {
var cvs = Snap("#cvs");
var x1 = 75;
var x2 = 200;
var x3 = 325;
var y = 150;
/*****************************************************************************************************************/
    // Create the first circle on the left
    var el1 = cvs.ellipse(x1, y, 50, 50);
    // styling the circle 
    el1.attr({fill: 'green', opacity:'.5', stroke: 'black', strokeWidth: '1px'});
    // creates the text for the first svg and then sets the attributes for the text
    var t1 = cvs.text(50, 210 , "Empty");
    t1.attr({pointerEvents:'none', fontSize: '33', fontFamily: 'fairview'});
    
    // Add a hover event for the first svg
    el1.hover(
      function(e) { this.animate({fill:'forestgreen', opacity:'1', rx:'55', ry:'55'}, 500, mina.bounce); },
      function(e) { this.animate({fill:'green', opacity:'.5', rx:'50', ry:'50'}, 500, mina.bounce); }
    );
    // allows the svg to be clickable and go to the specified url
    el1.click(
        function(e) {document.location = "http://www.patrickroderman.com/Smoogle/"}
      );
/*****************************************************************************************************************/
     // Create the second circle in the middle
    var el2 = cvs.ellipse(x2, y, 50, 50);
     // styling the circle 
    el2.attr({fill: 'gold', opacity:'.5', stroke: 'black', strokeWidth: '1px'});
     // creates the text for the second svg and then sets the attributes for the text 
    var t2 = cvs.text(455, 415, "Google");
    t2.attr({pointerEvents:'none', fontSize: '50', fontFamily: 'fairview'});

    // Add a hover event for the second svg
    el2.hover(
      function(e) { this.animate({fill:'yellow', opacity:'1', rx:'55', ry:'55', strokeWidth: '1px'}, 500, mina.bounce); },
      function(e) { this.animate({fill:'gold', opacity:'.5', rx:'50', ry:'50', strokeWidth: '1px'}, 500, mina.bounce); } 
    );
    // allows the svg to be clickable and go to the specified url
    el2.click(
        function(e) {document.location = "http://www.google.com"}
      );
/*****************************************************************************************************************/
     // Creat the third circle on the right.
    var el3 = cvs.ellipse(x3, y, 50, 50);
     // styling the circle 
    el3.attr({fill: 'tomato', opacity:'.5', stroke: 'black', strokeWidth: '1px'});
     // creates the text for the third svg and then sets the attributes for the text
    var t2 = cvs.text(765, 415, "Duck Duck Go");
    t2.attr({pointerEvents:'none', fontSize: '50', fontFamily: 'fairview'});

    // Add a hover event for the third svg
    el3.hover(
      function(e) { this.animate({fill:'red', opacity:'1',rx:'55', ry:'55'}, 500, mina.bounce); },
      function(e) { this.animate({fill:'tomato', opacity:'.5', rx:'50', ry:'50'}, 500, mina.bounce); }
    );
    // allows the svg to be clickable and go to the specified url
el3.click(
        function(e) {document.location = "https://duckduckgo.com/"}
      );

})();
  

// JavaScript Document

startList = function() {
if (document.all&&document.getElementById) {
navRoot = document.getElementById("nav");
for (i=0; i<navRoot.childNodes.length; i++) {
node = navRoot.childNodes[i];
if (node.nodeName=="LI") {
node.onmouseover=function() {
this.className+=" over";
  }
  node.onmouseout=function() {
  this.className=this.className.replace(" over", "");
   }
   }
  }
 }
}
window.onload=startList;


// JavaScript Links 

function externalLinks() {
if (!document.getElementsByTagName) return; 
var anchors = document.getElementsByTagName("a"); 
for (var i=0; i<anchors.length; i++) { 
var anchor = anchors[i]; 
if (anchor.getAttribute("href") && 
anchor.getAttribute("rel") == "external") 
anchor.target = "_blank";
} 
} 
window.onload = externalLinks;
function showLeftPanel() {
      var elem = document.getElementById("left-panel");
      if (elem.classList) {
        console.log("classList supported");
        elem.classList.toggle("show");
      } else {
        var classes = elem.className;
        if (classes.indexOf("show") >= 0) {
          elem.className = classes.replace("show", "");
        } else {
          elem.className = classes + " show"; 
        }
        console.log(elem.className);
      }
    }
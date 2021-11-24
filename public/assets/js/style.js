
  function openMenu(){
    if($("#menu").hasClass("menu-background-grey")){
            $("#menu").removeClass("menu-background-grey");
            $("#menu").addClass("color-transparent");
            $("#items-menu").removeClass("menu-background-solid");
            $("#menu-bars,#items-menu >li >a").removeClass("text-dark");
            $("#menu-bars,#items-menu >li >a").addClass("text-white");
            $("#items-menu >li").removeClass("li-black");
    }else{
            $("#menu").addClass("menu-background-grey");
            $("#menu").removeClass("color-transparent");
            $("#menu-bars,#items-menu >li >a").addClass("text-dark");
            $("#items-menu >li >a").css("font-weight","500");
            $("#menu-bars,#items-menu >li >a").removeClass("text-white");
            $("#items-menu >li").addClass("li-black");

    }
  }

// Menu responsive
function openNav() {
    document.getElementById("myNav").style.height = "100%";
    $("#btn-menu-responsive").addClass('d-none');
  }

  function closeNav() {
    document.getElementById("myNav").style.height = "0%";
    $("#btn-menu-responsive").removeClass('d-none');

  }

var g_isSP = false;
function g_jqAddClass(selname, clanim, delay) {
	if(delay > 0) {
		setTimeout(function() {
			$(selname).addClass(clanim);	
		}, delay);
	}	
	else $(selname).addClass(clanim);
}
$(document).ready(function(){
	setTimeout(function() {
		$('#loader-wrapper').addClass('loader-close');
	}, 2000);
	setTimeout(function() {
		$('body').removeClass('loading').addClass('loaded');
	}, 3000);
	if($(window).width() < $(window).height()) g_isSP = true;
	$(".header-nav-controller").click(function(){
		$("#mainHeader").toggleClass("mobilemenuactive");
		$("body").toggleClass("menu_open");
	});
	$(window).resize(function(){
		var windowWidth = $(window).width();
		if(windowWidth > 991 && $("body").hasClass("menu_open") && $("#mainHeader").hasClass("mobilemenuactive")){
			$("#mainHeader").removeClass("mobilemenuactive");
			$("body").removeClass("menu_open");
		}
	});

	$(window).on("load resize scroll", function(){
		var linePath = $(".line").width();
		var windowSize = $(window).height();
		var windowTop = $(window).scrollTop();
		var documentHeight = $(document).innerHeight();
		var calculation = ((windowTop * linePath) / (documentHeight - windowSize));

		if(windowTop == 0){
			$(".pointer").css({"left": "0px"});
		}else if(windowTop > 0 && windowTop < (documentHeight - windowSize)){
			$(".pointer").css({"left": calculation});
		}
	});


	
	var servicesSectionClass = $(".main-service-sec .outer-row");
	$(servicesSectionClass).each(function(index){
		$(this).addClass(("service"+index));
	})
	
	var businessSecClass = $(".business-sec .business-bx-col");
	$(businessSecClass).each(function(index){
		$(this).addClass(("business"+index));
	})

	$(window).on("load resize scroll", function(){
	    var top = $(window).scrollTop();
	    var windowHeight = $(window).height();

	    // business section js
	    var businessSecOne = $("section.business-sec .business-head").offset().top;
		console.log()
	    if(top >= (businessSecOne - windowHeight)){
			g_jqAddClass("section.business-sec .business-head", "anistart");
	    }
	    var businessSecOne = $(".business-sec .business-bx-col.business0").offset().top;
	    if(top >= (businessSecOne - windowHeight)){
			g_jqAddClass(".business-sec .business-bx-col.business0", "anistart");
	    }
	    var businessSecTwo = $(".business-sec .business-bx-col.business1").offset().top;
	    if(top >= (businessSecTwo - windowHeight)){
			if(!g_isSP) g_jqAddClass(".business-sec .business-bx-col.business1", "anistart", 100);	
	        else g_jqAddClass(".business-sec .business-bx-col.business1", "anistart");	
	    }
	    var businessSecThree = $(".business-sec .business-bx-col.business2").offset().top;
	    if(top >= (businessSecThree - windowHeight)){
			if(!g_isSP) g_jqAddClass(".business-sec .business-bx-col.business2", "anistart", 200);
			else g_jqAddClass(".business-sec .business-bx-col.business2", "anistart");
	    }

	    // service section js
	    var serviceSecOne = $(".outer-row.service0").offset().top;
		if(top >= (serviceSecOne - windowHeight)){
	        if(!g_isSP) g_jqAddClass(".outer-row.service0 .service-cont", "anistart", 600);
			else g_jqAddClass(".outer-row.service0 .service-cont", "anistart");
	    }
		serviceSecOne = $(".outer-row.service0 .bg-img").offset().top;
		if(top >= (serviceSecOne - windowHeight)){
			g_jqAddClass(".outer-row.service0 .bg-img", 'anistart');
	    }
	    var serviceSecTwo = $(".outer-row.service1 .bg-img").offset().top;
	    if(top >= (serviceSecTwo - windowHeight)){
	        g_jqAddClass(".outer-row.service1 .bg-img", "anistart");
	    }
		serviceSecTwo = $(".outer-row.service1 .service-cont").offset().top;
		if(top >= (serviceSecTwo - windowHeight)){
			if(!g_isSP) g_jqAddClass(".outer-row.service1 .service-cont", "anistart");
			else g_jqAddClass(".outer-row.service1 .service-cont", "anistart", 600);
	    }
		
	    var serviceSecThree = $(".outer-row.service2 .service-cont").offset().top;
	    if(top >= (serviceSecThree - windowHeight)){
	        if(!g_isSP) g_jqAddClass(".outer-row.service2 .service-cont", "anistart", 600);
			else g_jqAddClass(".outer-row.service2 .service-cont", "anistart");
	    }
	    serviceSecThree = $(".outer-row.service2 .bg-img").offset().top;
	    if(top >= (serviceSecThree - windowHeight)){
	        g_jqAddClass(".outer-row.service2 .bg-img", "anistart");
	    }


	    // company section js
	    var companySec = $("section.company-sec .head").offset().top;
	    if(top >= (companySec - windowHeight)){
			g_jqAddClass("section.company-sec .head", 'anistart');
	    }
		companySec = $(".company-sec .company-img-big").offset().top;
	    if(top >= (companySec - windowHeight)){
			g_jqAddClass(".company-sec .company-img-big", 'anistart');
	    }
		companySec = $("section.company-sec .company-info").offset().top;
	    if(top >= (companySec - windowHeight)){
			g_jqAddClass("section.company-sec .company-info", 'anistart');
	    }
		// Google Map section
	    var gmapSec = $('.google-map-sec .in-container').offset().top;
	    if(top >= (companySec - windowHeight)){
			g_jqAddClass(".google-map-sec .in-container", 'anistart');
	    }
	    // contact section js
	    var contactSec = $("section.contact-sec .head").offset().top;
	    if(top >= (contactSec - windowHeight)){
	        $("section.contact-sec .head").addClass("anistart");
	    }
	    contactSec = $("section.contact-sec .contact-img").offset().top;
	    if(top >= (contactSec - windowHeight)){
	        $("section.contact-sec .contact-img").addClass("anistart");
	    }
	    
	    // recruit section js
	    var recruitSecImg = $("section.recruit-sec .head").offset().top;
	    if(top >= (recruitSecImg - windowHeight)){
	        $("section.recruit-sec .head").addClass("anistart");
	    }
	    var recruitSecImg = $("section.recruit-sec .recruit-img").offset().top;
	    if(top >= (recruitSecImg - windowHeight)){
	        $("section.recruit-sec .recruit-img").addClass("anistart");
	    }
	    var recruitSecText = $(".recruit-sec .recruit-cont").offset().top;
	    if(top >= (recruitSecText - windowHeight)){
	        $(".recruit-sec .recruit-cont").addClass("anistart");
	    }
		
		recruitSecText = $("section.recruit-sec .recruit-cont .img").offset().top;
	    if(top >= (recruitSecText - windowHeight)){
	        $("section.recruit-sec .recruit-cont .img").addClass("anistart");
	    }
		recruitSecText = $("section.recruit-sec .recruit-cont .button").offset().top;
	    if(top >= (recruitSecText - windowHeight)){
	        $("section.recruit-sec .recruit-cont .button").addClass("anistart");
	    }
	    // repeat end for all sections
	});








	
});


//Cloud ----------------------
(function () {
	var lastTime = 0;
	var vendors = ["ms", "moz", "webkit", "o"];
	for (
	  var x = 0;
	  x < vendors.length && !window.requestAnimationFrame;
	  ++x
	) {
	  window.requestAnimationFrame =
		window[vendors[x] + "RequestAnimationFrame"];
	  window.cancelRequestAnimationFrame =
		window[vendors[x] + "CancelRequestAnimationFrame"];
	}

	if (!window.requestAnimationFrame)
	  window.requestAnimationFrame = function (callback, element) {
		var currTime = new Date().getTime();
		var timeToCall = Math.max(0, 16 - (currTime - lastTime));
		var id = window.setTimeout(function () {
		  callback(currTime + timeToCall);
		}, timeToCall);
		lastTime = currTime + timeToCall;
		return id;
	  };

	if (!window.cancelAnimationFrame)
	  window.cancelAnimationFrame = function (id) {
		clearTimeout(id);
	  };
  })();

  var layers = [],
	objects = [],
	textures = [],
	world = document.getElementById("world"),
	viewport = document.getElementById("viewport"),
	d = 0,
	p = 400,
	worldXAngle = 0,
	worldYAngle = 0,
	computedWeights = [];

  var links = document.querySelectorAll("a[rel=external]");
  for (var j = 0; j < links.length; j++) {
	var a = links[j];
	a.addEventListener(
	  "click",
	  function (e) {
		window.open(this.href, "_blank");
		e.preventDefault();
	  },
	  false
	);
  }

  viewport.style.webkitPerspective = p;
  viewport.style.MozPerspective = p + "px";
  viewport.style.oPerspective = p;
  viewport.style.perspective = p;

  textures = [
	{ name: "white cloud", file: "img/cloud.png", opacity: 1, weight: 0 },
  ];

  var el = document.getElementById("textureList");
  for (var j = 0; j < textures.length; j++) {
	var li = document.createElement("li");
	var span = document.createElement("span");
	span.textContent = textures[j].name;
	var div = document.createElement("div");
	div.className = "buttons";
	var btnNone = document.createElement("a");
	btnNone.setAttribute("id", "btnNone" + j);
	btnNone.setAttribute("href", "#");
	btnNone.textContent = "None";
	btnNone.className = "left button";
	var btnFew = document.createElement("a");
	btnFew.setAttribute("id", "btnFew" + j);
	btnFew.setAttribute("href", "#");
	btnFew.textContent = "A few";
	btnFew.className = "middle button";
	var btnNormal = document.createElement("a");
	btnNormal.setAttribute("id", "btnNormal" + j);
	btnNormal.setAttribute("href", "#");
	btnNormal.textContent = "Some";
	btnNormal.className = "middle button";
	var btnLot = document.createElement("a");
	btnLot.setAttribute("id", "btnLot" + j);
	btnLot.setAttribute("href", "#");
	btnLot.textContent = "A lot";
	btnLot.className = "right button";

	(function (id) {
	  btnNone.addEventListener("click", function () {
		setTextureUsage(id, "None");
	  });
	  btnFew.addEventListener("click", function () {
		setTextureUsage(id, "Few");
	  });
	  btnNormal.addEventListener("click", function () {
		setTextureUsage(id, "Normal");
	  });
	  btnLot.addEventListener("click", function () {
		setTextureUsage(id, "Lot");
	  });
	})(j);

	li.appendChild(span);
	div.appendChild(btnNone);
	div.appendChild(btnFew);
	div.appendChild(btnNormal);
	div.appendChild(btnLot);
	li.appendChild(div);

  }

  generate();

  function createCloud(no) {
	var div = document.createElement("div");
	div.className = "cloudBase";
	var x = 256 - Math.random() * 512;
	var y = 256 - Math.random() * 512;
	var z = 250 - Math.random() * 512;
	if(no < 5) z = 250 - Math.random() * 30;
	if(no == 0) {
	  x = 40 - Math.random() * 80;
	  y = 40 - Math.random() * 80;
	  z = 250 - Math.random() * 100;
	}
	else if(no==1) {
	  x = -200 + Math.random() * 100;
	  y = -200 + Math.random() * 100;
	}
	else if(no==2) {
	  x = 200 - Math.random() * 100;
	  y = 200 - Math.random() * 100;
	}
	else if(no==3) {
	  x = -200 + Math.random() * 100;
	  y = 200 - Math.random() * 100;
	}
	else if(no==4) {
	  x = 200 - Math.random() * 100;
	  y = -200 + Math.random() * 100;
	}
	var t =
	  "translateX( " +
	  x +
	  "px ) translateY( " +
	  y +
	  "px ) translateZ( " +
	  z +
	  "px )";
	div.style.webkitTransform = div.style.MozTransform = div.style.oTransform = div.style.transform = t;
	world.appendChild(div);

	for (var j = 0; j < 5 + Math.round(Math.random() * 10); j++) {
	  var cloud = document.createElement("img");
	  cloud.style.opacity = 0;
	  var r = Math.random();
	  var src = "img/cloud.png";
	  for (var k = 0; k < computedWeights.length; k++) {
		if (r >= computedWeights[k].min && r <= computedWeights[k].max) {
		  (function (img) {
			img.addEventListener("load", function () {
			  img.style.opacity = 0.8;
			});
		  })(cloud);
		  src = computedWeights[k].src;
		}
	  }
	  if (computedWeights.length === 0) {
		cloud.style.opacity = 0.8;
	  }
	  cloud.setAttribute("src", src);
	  cloud.className = "cloudLayer";

	  var x = 256 - Math.random() * 512;
	  var y = 256 - Math.random() * 512;
	  var z = 100 - Math.random() * 200;
	  var a = Math.random() * 360;
	  var s = 0.25 + Math.random();
	  x *= 0.2;
	  y *= 0.2;
	  cloud.data = {
		x: x,
		y: y,
		z: z,
		a: a,
		s: s,
		speed: 0.1 * Math.random(),
	  };
	  var t =
		"translateX( " +
		x +
		"px ) translateY( " +
		y +
		"px ) translateZ( " +
		z +
		"px ) rotateZ( " +
		a +
		"deg ) scale( " +
		s +
		" )";
	  cloud.style.webkitTransform = cloud.style.MozTransform = cloud.style.oTransform = cloud.style.transform = t;

	  div.appendChild(cloud);
	  layers.push(cloud);
	}

	return div;
  }

  function generate() {
	objects = [];
	if (world.hasChildNodes()) {
	  while (world.childNodes.length >= 1) {
		world.removeChild(world.firstChild);
	  }
	}
	computedWeights = [];
	var total = 0;
	for (var j = 0; j < textures.length; j++) {
	  if (textures[j].weight > 0) {
		total += textures[j].weight;
	  }
	}
	var accum = 0;
	for (var j = 0; j < textures.length; j++) {
	  if (textures[j].weight > 0) {
		var w = textures[j].weight / total;
		computedWeights.push({
		  src: textures[j].file,
		  min: accum,
		  max: accum + w,
		});
		accum += w;
	  }
	}
	for (var j = 0; j < 10; j++) {
	  objects.push(createCloud(j));
	}
  }

  function updateView() {
	var t =
	  "translateZ( " +
	  d +
	  "px ) rotateX( " +
	  worldXAngle +
	  "deg) rotateY( " +
	  worldYAngle +
	  "deg)";
	world.style.webkitTransform = world.style.MozTransform = world.style.oTransform = world.style.transform = t;
  }

  function orientationhandler(e) {
	if (!e.gamma && !e.beta) {
	  e.gamma = -(e.x * (180 / Math.PI));
	  e.beta = -(e.y * (180 / Math.PI));
	}

	var x = e.gamma;
	var y = e.beta;

	worldXAngle = y;
	worldYAngle = x;
	updateView();
  }

  function update() {
	  if(lastTouchX > 0 || lastTouchY > 0) {
		  let preX = followTouchX, preY = followTouchY;
		  if(followTouchX < lastTouchX) followTouchX = ((followTouchX+followSpeed) > lastTouchX) ? lastTouchX : (followTouchX+followSpeed);
		  else if(followTouchX > lastTouchX) followTouchX = ((followTouchX-followSpeed) < lastTouchX) ? lastTouchX : (followTouchX-followSpeed);
		  if(followTouchY < lastTouchY) followTouchY = ((followTouchY+followSpeed) > lastTouchY) ? lastTouchY : (followTouchY+followSpeed);
		  else if(followTouchY > lastTouchY) followTouchY = ((followTouchY-followSpeed) < lastTouchY) ? lastTouchY : (followTouchY-followSpeed);
		  if(followTouchX != preX || followTouchY != preY) {
			worldYAngle = -(0.5 - followTouchX / window.innerWidth) * 10;
			worldXAngle = (0.5 - followTouchY / window.innerHeight) * 10;
			
				updateView();
		  }
			  
	  }
	for (var j = 0; j < layers.length; j++) {
	  var layer = layers[j];
	  layer.data.a += layer.data.speed;
	  var t =
		"translateX( " +
		layer.data.x +
		"px ) translateY( " +
		layer.data.y +
		"px ) translateZ( " +
		layer.data.z +
		"px ) rotateY( " +
		-worldYAngle +
		"deg ) rotateX( " +
		-worldXAngle +
		"deg ) rotateZ( " +
		layer.data.a +
		"deg ) scale( " +
		layer.data.s +
		")";
	  layer.style.webkitTransform = layer.style.MozTransform = layer.style.oTransform = layer.style.transform = t;
	  //layer.style.webkitFilter = 'blur(5px)';
	}

	requestAnimationFrame(update);
  }

  update();


      window.addEventListener( 'deviceorientation', orientationhandler, false );
      window.addEventListener( 'MozOrientation', orientationhandler, false );

      window.addEventListener("mousemove", function (e) {
        worldYAngle = -(0.5 - e.clientX / window.innerWidth) * 10;
        worldXAngle = (0.5 - e.clientY / window.innerHeight) * 10;
        //worldXAngle = .1 * ( e.clientY - .5 * window.innerHeight );
        //worldYAngle = .1 * ( e.clientX - .5 * window.innerWidth );
        updateView();
      });
	  var followTouchX = 0;
	  var followTouchY = 0;
	  var lastTouchX = 0;
	  var lastTouchY = 0;
	  var followSpeed = 10;
      window.addEventListener("touchmove", function (e) {
        var ptr = e.changedTouches.length;
        while (ptr--) {
          var touch = e.changedTouches[ptr];
          lastTouchX = touch.pageX;
		  lastTouchY = touch.pageY;
          updateView();
        }
        e.preventDefault();
      });
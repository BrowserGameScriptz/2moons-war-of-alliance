var pausedAnimation = false;
var canvas;
var context;
var screenH;
var screenW;
var stars = [];
var fps = 60;
var numStars = 500;


//Canvas and settings
var moveStars = [],
	screenW = $(window).width(),
	shootingStars = [],
	layers = [		
		{ speed: 0.000, scale: 0.40, count: Math.round(screenW /  5), color:[ 100,100,  100,100, 100,100], increment:0.010},
		{ speed: 0.000, scale: 0.50, count: Math.round(screenW / 10), color:[ 200, 55,  200, 55, 200, 55], increment:0.010},
		{ speed: 0.015, scale: 0.50, count: Math.round(screenW / 10), color:[  50,100,  150,100, 200, 55], increment:0.001},
		{ speed: 0.030, scale: 0.60, count: Math.round(screenW / 35), color:[  50,100,  150,100, 200, 55], increment:0.001},
		{ speed: 0.050, scale: 0.70, count: Math.round(screenW / 65), color:[  50,100,  150,100, 200, 55], increment:0.001}
	],
	starsAngle = 145,
	shootingStarSpeed = {
		min: 15,
		max: 40
	},
	shootingStarOpacityDelta = 0.01,
	trailLengthDelta = 0.01,
	shootingStarEmittingInterval = 10000,
	shootingStarLifeTime = 500,
	maxTrailLength = 300,
	starBaseRadius = 2,
	shootingStarRadius = 3,
	paused = false;


$(window).resize(function(){
	
	stopAnimation()
  	screenH 		= $(this).height();
	screenW 		= $(this).width();
	numStars 		= Math.ceil(screenW / 400) * 100;
	canvas.attr('height', screenH);
	canvas.attr('width', screenW);
	
	CreateObjsSpace();
});

function CreateObjsSpace()
{
	moveStars 	= [];

	//Create all MoveStars
	for (var j = 0; j < layers.length; j += 1) {
		var layer = layers[j];
		for (var i = 0; i < layer.count; i += 1) {
			var opacity = Math.random();
			var color 	= 	Math.round(layer.color[0] + Math.random() * layer.color[1]) + ',' + 
							Math.round(layer.color[2] + Math.random() * layer.color[3]) + ',' + 
							Math.round(layer.color[4] + Math.random() * layer.color[5]);
			var star = MoveStar.create(randomRange(0, screenW), randomRange(0, screenH), 0, 0, opacity, color, layer.increment);
			star.radius = starBaseRadius * layer.scale;
			star.setSpeed(layer.speed);
			star.setHeading(degreesToRads(starsAngle));
			moveStars.push(star);
		}
	}
		
	if(Animation)
		animateInterval = setInterval(animate, 1000 / fps);
	else
		animate();
}

$('document').ready(function()
{
  	// Calculate the screen size
	screenH 		= $(window).height();
	screenW 		= $(window).width();
	
	// Get the canvas
	canvas = $('#space');
	
	// Fill out the canvas
	canvas.attr('height', screenH);
	canvas.attr('width', screenW);
	context = canvas[0].getContext('2d');

  	CreateObjsSpace();
});

/**
 * Animate the canvas
 */
function animate() 
{
	if (pausedAnimation) return;
	
	context.clearRect(0, 0, screenW, screenH);
	updateMovingStars();	
}

/* stop Animation */
function stopAnimation()
{
     clearInterval(animateInterval);
}

//stopAnimation();
//Helpers
function lineToAngle(x1, y1, length, radians) {
	var x2 = x1 + length * Math.cos(radians),
		y2 = y1 + length * Math.sin(radians);
	return { x: x2, y: y2 };
}

function randomRange(min, max) {
	return min + Math.random() * (max - min);
}

function degreesToRads(degrees) {
	return degrees / 180 * Math.PI;
}

//MoveStar
var MoveStar = {
	x: 0,
	y: 0,
	vx: 0,
	vy: 0,
	radius: 0,
	opacity: 1,
	factor: 1,
	increment: 0,
	color:  '',

	create: function(x, y, speed, direction, opacity, color, increment) {
		var obj = Object.create(this);
		obj.x = x;
		obj.y = y;
		obj.vx = Math.cos(direction) * speed;
		obj.vy = Math.sin(direction) * speed;
		obj.opacity = opacity;
		obj.color = color;
		obj.increment = increment + Math.random() * increment;
		return obj;
	},

	getSpeed: function() {
		return Math.sqrt(this.vx * this.vx + this.vy * this.vy);
	},

	setSpeed: function(speed) {
		var heading = this.getHeading();
		this.vx = Math.cos(heading) * speed;
		this.vy = Math.sin(heading) * speed;
	},

	getHeading: function() {
		return Math.atan2(this.vy, this.vx);
	},

	setHeading: function(heading) {
		var speed = this.getSpeed();
		this.vx = Math.cos(heading) * speed;
		this.vy = Math.sin(heading) * speed;
	},

	update: function() {
		this.x += this.vx;
		this.y += this.vy;
	}
};

function createShootingStar() {
	if(Math.random() < .8) return;
	var shootingStar = MoveStar.create(randomRange(screenW * .8, screenW), randomRange(0, screenH * .5), 0, 0, Math.random(), '');
	shootingStar.setSpeed(randomRange(shootingStarSpeed.min, shootingStarSpeed.max));
	shootingStar.setHeading(degreesToRads(starsAngle));
	shootingStar.radius = shootingStarRadius;
	shootingStar.opacity = 0;
	shootingStar.trailLengthDelta = 0;
	shootingStar.isSpawning = true;
	shootingStar.isDying = false;
	shootingStars.push(shootingStar);
}

function killShootingStar(shootingStar) {
	setTimeout(function() {
		shootingStar.isDying = true;
	}, shootingStarLifeTime);
}

function updateMovingStars() 
{	
	for (var i = 0; i < moveStars.length; i += 1) {
		var star = moveStars[i];
		star.update();
		drawStar(star);
		if (star.x > screenW) {
			star.x = 0;
		}else
		if (star.x < 0) {
			star.x = screenW;
		}
		if (star.y > screenH) {
			star.y = 0;
		}else
		if (star.y < 0) {
			star.y = screenH;
		}
		
		star.opacity = star.opacity + star.increment * star.factor;
		
		// Change the opacity
		if(star.opacity > 1) {
			star.factor 	= -1;
			star.opacity	= 1;
		}
		else if(star.opacity <= .0) {
			star.factor 	= 1;
			star.opacity	= .0;
		}
		
	}

	for (i = 0; i < shootingStars.length; i += 1) {
		var shootingStar = shootingStars[i];
		if (shootingStar.isSpawning) {
			shootingStar.opacity += shootingStarOpacityDelta;
			if (shootingStar.opacity >= 1.0) {
				shootingStar.isSpawning = false;
				killShootingStar(shootingStar);
			}
		}
		if (shootingStar.isDying) {
			shootingStar.opacity -= shootingStarOpacityDelta;
			if (shootingStar.opacity <= 0.0) {
				shootingStar.isDying = false;
				shootingStar.isDead = true;
			}
		}
		shootingStar.trailLengthDelta += trailLengthDelta;

		shootingStar.update();
		if (shootingStar.opacity > 0.0) {
			drawShootingStar(shootingStar);
		}
	}

	//Delete dead shooting shootingStars
	for (i = shootingStars.length -1; i >= 0 ; i--){
		if (shootingStars[i].isDead){
			shootingStars.splice(i, 1);
		}
	}
}

function drawStar(star) {
	context.fillStyle = "rgba(" + star.color + ", " + star.opacity + ")";
	context.beginPath();
	context.arc(star.x, star.y, star.radius, 0, Math.PI * 2, false);
	context.fill();	
}

function drawShootingStar(p) {
	var x = p.x,
		y = p.y,
		currentTrailLength = (maxTrailLength * p.trailLengthDelta),
		pos = lineToAngle(x, y, -currentTrailLength, p.getHeading());

	context.fillStyle = "rgba(255, 255, 255, " + p.opacity + ")";
	context.beginPath();
	context.arc(x, y, 2, 0, Math.PI * 2, false);
	context.fill();
	
	//trail
	context.fillStyle = "rgba(230, 250, 255, " + p.opacity + ")";
	context.beginPath();
	context.moveTo(x - 1, y - 1);
	context.lineTo(pos.x, pos.y);
	context.lineTo(x + 1, y + 1);
	context.closePath();
	context.fill();
}

//Shooting stars
setInterval(function() {
	if (pausedAnimation) return;
	createShootingStar();
}, shootingStarEmittingInterval);

window.onfocus = function () {
	pausedAnimation = false;
};

window.onblur = function () {
	pausedAnimation = true;
};

//-- Palnet3D
if(Animation && 1 < 0)
(function(p3D) {
	
	p3D.planetInit = false;
	
    p3D.metadata = {
        urls: {
            earth: {
                normalMaterial: 'styles/resource/images/planets/11.jpg',
                surfaceMaterial: 'styles/resource/images/planets/12.jpg',
                cloudsMaterial: 'styles/resource/images/planets/14.png',
            },
        }
    };

    p3D.toolkit = p3D.toolkit || {};
    p3D.toolkit.three = p3D.toolkit.three || {};
    p3D.view = p3D.view || {};
    p3D.view.milkyway = p3D.view.milkyway || {};
    p3D.view.milkyway.earth = p3D.view.milkyway.earth || {};

    p3D.toolkit.three.Publisher = class {
        constructor() {
            this._messageTypes = {};
        }
        get messageTypes() {
            return this._messageTypes;
        }
        subscribe(message, subscriber, callback) {
            var subscribers = this.messageTypes[message];
            if (subscribers) {
                if (this.findSubscriber(subscribers, subscriber) != -1) {
                    return;
                }
            } else {
                subscribers = [];
                this.messageTypes[message] = subscribers;
            }
            subscribers.push({
                subscriber: subscriber,
                callback: callback
            });
        }
        unsubscribe(message, subscriber, callback) {
            if (subscriber) {
                var subscribers = this.messageTypes[message];
                if (subscribers) {
                    var i = this.findSubscriber(subscribers, subscriber, callback);
                    if (i != -1) {
                        this.messageTypes[message].splice(i, 1);
                    }
                }
            } else {
                delete this.messageTypes[message];
            }
        }
        publish(message) {
            var subscribers = this.messageTypes[message];
            if (subscribers) {
                for (var i = 0; i < subscribers.length; i++) {
                    var args = [];
                    for (var j = 0; j < arguments.length - 1; j++) {
                        args.push(arguments[j + 1]);
                    }
                    subscribers[i].callback.apply(subscribers[i].subscriber, args);
                }
            }
        }
        findSubscriber(subscribers, subscriber) {
            for (var i = 0; i < subscribers.length; i++) {
                if (subscribers[i] == subscriber) {
                    return i;
                }
            }
            return -1;
        }
    }

    p3D.toolkit.three.R = class extends p3D.toolkit.three.Publisher {
        config() {
            return {
                keyUp: null,
                keyDown: null,
                keyPress: null,
                objects: []
            }
        }
        constructor(config) {
            super(config);
            this._objects = config && config.hasOwnProperty('objects') ? config.objects : this.config().objects;
            this._overObject = null;
            this._clickedObject = null;
        }
        get hook() {
            return this._hook;
        }
        get renderer() {
            return this._renderer;
        }
        get scene() {
            return this._scene;
        }
        get camera() {
            return this._camera;
        }
        get root() {
            return this._root;
        }
        get projector() {
            return this._projector;
        }
        get objects() {
            return this._objects;
        }
        get overObject() {
            return this._overObject;
        }
        set overObject(o) {
            this._overObject = o;
        }      
        onWindowResize(event) {
            this.renderer.setSize(this.hook.offsetWidth, this.hook.offsetHeight);
            this.camera.aspect = this.hook.offsetWidth / this.hook.offsetHeight;
            this.camera.updateProjectionMatrix();
        }
        findObjectFromIntersected(object, point, normal) {
            if (object.data) {
                return {
                    object: object.data,
                    point: point,
                    normal: normal
                };
            } else if (object.parent) {
                return this.findObjectFromIntersected(object.parent, point, normal);
            } else {
                return {
                    object: null,
                    point: null,
                    normal: null
                };
            }
        }
        addObject(obj) {
            this.objects.push(obj);
            if (obj.object3D) {
                this.root.add(obj.object3D);
            }
        }
        removeObject(obj) {
            var index = this.objects.indexOf(obj);
            if (index != -1) {
                this.objects.splice(index, 1);
                if (obj.object3D) {
                    this.root.remove(obj.object3D);
                }
            }
        }
        initWindowListeners() {
            let that = this;
            window.addEventListener('resize', function(event) {
                that.onWindowResize(event);
            }, false);
        }
        init(config) {
            let myConfig = config || {},
                container = myConfig.container,
                canvas = myConfig.canvas,
                renderer,
                scene,
                camera,
                root,
                projector;
            renderer = new THREE.WebGLRenderer({
                antialias: true,
                canvas: canvas
            });
            renderer.setSize(container.offsetWidth, container.offsetHeight);
            container.appendChild(renderer.domElement);
            scene = new THREE.Scene();
            scene.add(new THREE.AmbientLight(0x505050));
            scene.data = this;
            camera = new THREE.PerspectiveCamera(45, container.offsetWidth / container.offsetHeight, 1, 10000);
			camera.position.set(0, 0, 2.7333);
            scene.add(camera);
            root = new THREE.Object3D();
            scene.add(root);
            projector = new THREE.Projector();
            this._hook = container;
            this._renderer = renderer;
            this._scene = scene;
            this._camera = camera;
            this._projector = projector;
            this._root = root;
            this.initWindowListeners();
        }
        run() {
            this.update();
            this.renderer.render(this.scene, this.camera);
            var that = this;
            requestAnimationFrame(function() {
                that.run();
            });
        }
        update() {
            var i, len;
            len = this.objects.length;
            for (i = 0; i < len; i++) {
                this.objects[i].update();
            }
        }
    }


    p3D.toolkit.three.Object = class extends p3D.toolkit.three.Publisher {
        constructor() {
            super();
			this.sun = {};
			this.earth = {};
            this._object3D = null;
            this._children = [];
        }
        get object3D() {
            return this._object3D;
        }
        set object3D(o) {
            //this._object3D.data = this;
            this._object3D = o;
        }
        get scene() {
            var scene = null;
            if (this.object3D) {
                var obj = this.object3D;
                while (obj.parent) {
                    obj = obj.parent;
                }
                scene = obj;
            }
            return scene;
        }
        get app() {
            var scene = this.scene;
            return scene ? scene.data : null;
        }
        get children() {
            return this._children;
        }
        removeChild(child) {
            var index = this.children.indexOf(child);
            if (index != -1) {
                this.children.splice(index, 1);
                if (child.object3D) {
                    this.object3D.remove(child.object3D);
                }
            }
        }
        addChild(child) {
            this.children.push(child);
            if (child.object3D) {
                this.object3D.add(child.object3D);
            }
        }
        updateChildren() {
            var i, len;
            len = this.children.length;
            for (i = 0; i < len; i++) {
                this.children[i].update();
            }
        }
        setPosition(x, y, z) {
            if (this.object3D) {
                this.object3D.position.set(x, y, z);
            }
        }
        setScale(x, y, z) {
            if (this.object3D) {
                this.object3D.scale.set(x, y, z);
            }
        }
        setVisible(visible) {
            function setVisible(obj, visible) {
                obj.visible = visible;
                var i, len = obj.children.length;
                for (i = 0; i < len; i++) {
                    setVisible(obj.children[i], visible);
                }
            }
            if (this.object3D) {
                setVisible(this.object3D, visible);
            }
        }
        update() {
            this.updateChildren();
        }
        init() {}
    }

    p3D.view.milkyway.Planet = class extends p3D.toolkit.three.Object {
        config() {
            return {
                size: 1,
                distance: 0.0,
                period: 0.0,
                map: '',
                revolutionSpeed: 0.002,
                animateOrbit: true,
                animateRotation: true,
                autoInit: false
            }
        }
        constructor(config) {
            super(config);
            this._autoInit = config && config.hasOwnProperty('autoInit') ? config.autoInit : this.config().autoInit;
            this._size = config && config.hasOwnProperty('size') ? config.size : this.config().size;
            this._distance = config && config.hasOwnProperty('distance') ? config.distance : this.config().distance;
            this._period = config && config.hasOwnProperty('period') ? config.period : this.config().period;
            this._map = config && config.hasOwnProperty('map') ? config.map : this.config().map;
            this._revolutionSpeed = config && config.hasOwnProperty('revolutionSpeed') ? config.revolutionSpeed : this.config().revolutionSpeed;
            this._animateOrbit = config && config.hasOwnProperty('animateOrbit') ? config.animateOrbit : this.config().animateOrbit;
            this._animateRotation = config && config.hasOwnProperty('animateRotation') ? config.animateRotation : this.config().animateRotation;
            if (this.autoInit) {
                this.init();
            }
        }
        get size() {
            return this._size;
        }
        get distance() {
            return this._distance;
        }
        get period() {
            return this._period;
        }
        get map() {
            return this._map;
        }
        get revolutionSpeed() {
            return this._revolutionSpeed;
        }
        set revolutionSpeed(speed) {
            this._revolutionSpeed = speed;
        }
        get animateOrbit() {
            return this._animateOrbit;
        }
        get animateRotation() {
            return this._animateRotation;
        }
        get planetGroup() {
            return this._planetGroup;
        }
        get globeMesh() {
            return this._globeMesh;
        }
        get autoInit() {
            return this._autoInit;
        }
        update() {
            if (this.animateOrbit) {
                this.object3D.rotation.y += this.revolutionSpeed / this.period;
            }
            this.updateChildren();
        }
        render() {
            let geometry = new THREE.SphereGeometry(1, 32, 32),
                texture = THREE.ImageUtils.loadTexture(this.map),
                material = new THREE.MeshPhongMaterial({
                    map: texture,
                    ambient: 0x333333
                }),
                globeMesh = new THREE.Mesh(geometry, material);
            this.planetGroup.add(globeMesh);
            this._globeMesh = globeMesh;
        }
        init() {
            let planetOrbitGroup = new THREE.Object3D(),
                planetGroup = new THREE.Object3D(),
                distSquared = this.distance * this.distance;
            planetGroup.position.set(Math.sqrt(distSquared / 2), 0, -Math.sqrt(distSquared / 2));
            planetOrbitGroup.add(planetGroup);
            planetGroup.scale.set(this.size, this.size, this.size);
            this.object3D = planetOrbitGroup;
            this._planetGroup = planetGroup;
            this.render();
        }
    }

    p3D.view.milkyway.earth.Earth = class extends p3D.view.milkyway.Planet {
        constructor() {
            super();
        }
        get rotationY() {
            return 0.0011;
        }
        get tilt() {
            return 0.0;
        }
        get radius() {
            return 6000;
        }
        get cloudsScale() {
            return 1.005;
        }
        get cloudRotationY() {
            return this.rotationY * 1.515;
        }
        get globeMesh() {
            return this._globeMesh;
        }
        get cloudsMesh() {
            return this._cloudsMesh;
        }
        update() {				
			if (this.globeMesh) {
                this.globeMesh.rotation.y += this.rotationY;
            }
            if (this.cloudsMesh) {
                this.cloudsMesh.rotation.y +=+this.cloudRotationY;
            }
            this.updateChildren();
        }
        init() {
            let group = new THREE.Object3D();
            this.object3D = group;
            this.initSurface();
            this.initAtmosphere();
        }
		//-- ÐŸÐ»Ð°Ð½ÐµÑ‚Ð°
		initSurface() {
            let surfaceMap = THREE.ImageUtils.loadTexture(p3D.metadata.urls.earth.surfaceMaterial),
                normalMap = THREE.ImageUtils.loadTexture(p3D.metadata.urls.earth.normalMaterial),
                shader = THREE.ShaderUtils.lib["normal"],
                uniforms = THREE.UniformsUtils.clone(shader.uniforms);
            uniforms["tNormal"].texture = normalMap;
            uniforms["tDiffuse"].texture = surfaceMap;
            uniforms["enableDiffuse"].value = true;
            let shaderMaterial = new THREE.ShaderMaterial({
                    fragmentShader: shader.fragmentShader,
                    vertexShader: shader.vertexShader,
                    uniforms: uniforms,
                    lights: true
                }),
                globeGeometry = new THREE.SphereGeometry(1, 32, 32);
            globeGeometry.computeTangents();
            let globeMesh = new THREE.Mesh(globeGeometry, shaderMaterial);
            globeMesh.rotation.z = this.tilt;
            this.object3D.add(globeMesh);
            this._globeMesh = globeMesh;
        }
		//-- ÐÑ‚Ð¼Ð¾ÑÑ„ÐµÑ€Ð°
        initAtmosphere() {
            let cloudsMap = THREE.ImageUtils.loadTexture(p3D.metadata.urls.earth.cloudsMaterial),
                cloudsMaterial = new THREE.MeshLambertMaterial({
                    color: 0xffffff,
                    map: cloudsMap,
                    transparent: true
                }),
                cloudsGeometry = new THREE.SphereGeometry(this.cloudsScale, 32, 32),
                cloudsMesh = new THREE.Mesh(cloudsGeometry, cloudsMaterial);
            cloudsMesh.rotation.z = randomRange(1,100)*100;//this.tilt;
            this.object3D.add(cloudsMesh);
            this._cloudsMesh = cloudsMesh;
        }
    };

    p3D.view.milkyway.Sun = class extends p3D.toolkit.three.Object {
        constructor() {
            super();
        }
        update() {}
        init() {
            let light = new THREE.PointLight(0xffffff, 1.0, 200);
            light.position.set(-10, 10, 15);
            this.object3D = light;
        }
    };

    p3D.view.Viewport = class extends p3D.toolkit.three.R {		
        constructor() {
            super();
        }
        render() {
            this.sun = new p3D.view.milkyway.Sun({});
            this.earth = new p3D.view.milkyway.earth.Earth({});
            this.sun.init();
            this.addObject(this.sun);
            this.earth.init();
            this.addObject(this.earth);
            //this.addObject(stars);
        }
		resfarsh(){			
			this.removeObject(this.sun);
            this.removeObject(this.earth);
			this.render();
		}
    }

    /**
     * Provides requestAnimationFrame in a cross browser way.
     * http://paulirish.com/2011/requestanimationframe-for-smart-animating/
     */
    if (!window.requestAnimationFrame) {
        window.requestAnimationFrame = (function() {
            return window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function( /* function FrameRequestCallback */ callback, /* DOMElement Element */ element) {
                    window.setTimeout(callback, 1000 / 60);
                };
        })();
    }
    p3D.controller = p3D.controller || {
        onDOMContentLoaded: function() {
            let hook 		= document.getElementById("ov-planet-i"),
                container	= document.createElement("div");
		   hook.setAttribute('style', "background:none;");
           container.setAttribute('id', 'ov-planet-render');
           //container.addEventListener('click', this.onContainerClick);
            hook.appendChild(container);
            p3D.render = new p3D.view.Viewport({});
            p3D.render.init({
                container: container
            });
            p3D.render.render();
           	p3D.render.run();
        },
    };
    p3D.test = window.location.pathname.match('test') ? p3D.test || {
        publisher: function() {
            return new p3D.toolkit.three.Publisher();
        },
        r: function(config) {
            return new p3D.toolkit.three.R(config);
        },
        object: function(config) {
            return new p3D.toolkit.three.Object(config);
        },
        viewport: function(config) {
            return new p3D.view.Viewport(config);
        }
    } : null;
    $('document').ready(function(){
        document.body.addEventListener('DOMContentLoaded', p3D.controller.onDOMContentLoaded(), false);
    });
})(window.p3D = window.p3D || {});

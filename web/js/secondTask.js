/**
 * Created by aza on 3/13/2016.
 */

/**
 * Translits a string.
 *
 * @param {string} text - The text to be translitted.
 * @param {string} engToRus - A boolen to know where to translit.
 */
function translit(text, engToRus) {
    var
        rus = "щ   ш  ч  ц  ю  я  ё  ж  ъ  ы  э  а б в г д е з и й к л м н о п р с т у ф х ь".split(/ +/g),
        eng = "shh sh ch cz yu ya yo zh `` y' e` a b v g d e z i j k l m n o p r s t u f x `".split(/ +/g);
    var i;
    for(i = 0; i < rus.length; i++) {
        text = text.split(engToRus ? eng[i] : rus[i]).join(engToRus ? rus[i] : eng[i]);
        text = text.split(engToRus ? eng[i].toUpperCase() : rus[i].toUpperCase()).join(engToRus ? rus[i].toUpperCase() : eng[i].toUpperCase());
    }
    return text;
}

String.prototype.translit = translit;



/**
 * Represents a car.
 *
 * @constructor
 * @param {string} manufacturer - The manufacturer of the car.
 * @param {string} model - The model of the car.
 */
function Car(manufacturer, model) {
    this.manufacturer = manufacturer;
    this.model = model;
}

/**
 * Driving the car.
 *
 * @this   {Car}
 */
Car.prototype.drive = function() {
    alert('drive');
};

/**
 * Stopping the car
 *
 * @this   {Car}
 */
Car.prototype.stop = function() {
    alert('stop');
};

/**
 * Turning a car
 *
 * @this   {Car}
 */
Car.prototype.turn = function() {
    alert('turn');
};

/**
 * Represents a passenger car.
 *
 * @constructor
 * @param {string} manufacturer - The manufacturer of the passenger car.
 * @param {string} model - The model of the passenger car.
 * @param {int} seatingCapacity - The seatingCapacity of the passenger car.
 */
function PassengerCar(manufacturer, model, seatingCapacity){
    Car.call(this, manufacturer, model);
    this.seatingCapacity = seatingCapacity;
}

PassengerCar.prototype = Object.create(Car.prototype);
PassengerCar.prototype.constructor = PassengerCar;

/**
 * Putting passnegers into the passenger car.
 *
 * @this   {PassengerCar}
 */
PassengerCar.prototype.putPassengers = function() {
    alert('put passengers');
};

/**
 * Dropping passengers from the car.
 *
 * @this   {PassengerCar}
 */
PassengerCar.prototype.dropPassengers = function() {
    alert('drop passengers');
};

/**
 * Represents a truck car.
 *
 * @constructor
 * @param {string} manufacturer - The manufacturer of the truck car.
 * @param {string} model - The model of the truck car.
 * @param {int} maxLoad - The maxLoad of the truck car.
 */
function TruckCar(manufacturer, model, maxLoad){
    Car.call(this, manufacturer, model);
    this.maxLoad = maxLoad;
}
TruckCar.prototype = Object.create(Car.prototype);
TruckCar.prototype.constructor = TruckCar;

/**
 * Loading a truck car.
 *
 * @this   {Truckcar}
 */
TruckCar.prototype.load = function() {
    alert('load');
};

/**
 * Unloading a truck car
 *
 * @this   {TruckCar}
 */
TruckCar.prototype.unload = function() {
    alert('unload');
};


/**
 * Represents a sport car.
 * @constructor
 * @param {string} manufacturer - The manufacturer of the sport car.
 * @param {string} model - The model of the sport car.
 * @param {int} maxSpeed - The maxSpeed of the sport car.
 */
function SportCar(manufacturer, model, maxSpeed){
    Car.call(this, manufacturer, model);
    this.maxSpeed = maxSpeed;
}
SportCar.prototype = Object.create(Car.prototype);
SportCar.prototype.constructor = SportCar;

/**
 * Turning on acceleretion in sport car.
 *
 * @this   {SportCar}
 */
SportCar.prototype.enableAcceleration = function() {
    alert('enabled acceleration');
};


truck = new TruckCar('Volvo', 'FL6', 2000);
truck.drive();
truck.stop();
truck.turn();
truck.load();
truck.unload();

sport = new SportCar('Ferrari', 'Sergio', 300);
sport.drive();
sport.stop();
sport.turn();
sport.enableAcceleration();
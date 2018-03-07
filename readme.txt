@kankuro framework
@coded by chhatraman shrestha (https://github.com/chhatraman08/)
@contact cms111000111@gmail.com ,chhatramanshrestha@outlook.com, +9779800916365, +977021545815 (Nepal)
@company Need Technosoft (http://www.needtech.com/)
@help by Krishna Rai, Gopal Ghimire (https://github.com/gopalghimire1/)

To user router just 

user make a new router class
$route=new router();

To add post route like:
$route->post("route","controllername");

To add get route like:
$route->get("route","controllername")

to make controller
just make a function in controller like

function controllername($arguments){
//some actions
}

to show a view 
create a file viewname.php in views folder and

view("viewname");

to pass a variable use

view("viewname",$data);

all data are transfered using $viewbag in view;;;;;
;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;
for database we have dbset class;

eg:- 
$tablename="tablename";
$db=new dbset($tablename);

tolist all data
$db->tolist();

toselect data

$selector="or" ; and ,or supported

$db->where($selector,$colname1,$coldata1.........);


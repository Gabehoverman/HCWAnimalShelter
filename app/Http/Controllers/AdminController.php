<?php

namespace HCWS\Http\Controllers;

use Illuminate\Http\Request;

use HCWS\Models\Animal;
use HCWS\Models\User;
use HCWS\Models\Event;
use HCWS\Models\Stat;

class AdminController extends Controller
{
    public function animals(Request $req){
        $pageSize = 6;
        $data = array();
        $animals = Animal::with('type', 'animalPhotos.photo')->paginate($pageSize);
        $data["animals"] = $animals;

        return view('admin/manage-animals', $data);
    }

    public function events() {
        $events = Event::with('address')->get();
        $data = array("events" => $events);
        return view('admin/manage-events', $data);
    }

    public function settings(){
        $latestStat = Stat::orderBy('date', 'desc')->first();

        $users = User::where('hidden_ind', false)->get();

        $data = [
            "latestStat" => $latestStat,
            "users" => $users
        ];
        return view('admin/manage-settings', $data);
    }

    public function updateStats(Request $req){
        $latestStat = Stat::orderBy('date', 'desc')->first();

        $currentDate = new \DateTime();
        // determine if the latest stats were today
        if(isset($latestStat) && date_diff(new \DateTime($latestStat->date), $currentDate)->d < 1){
            // same day -> just update stats
            $latestStat->intake = $req->get("intake", null);
            $latestStat->adopted = $req->get("adopted", null);
            $latestStat->total = $req->get("total", null);
            $latestStat->euthanized = $req->get("euthanized", null);
            $latestStat->date = $currentDate;
            $latestStat->save();
        } else{
            // new day -> new row in stats table
            $stats = new Stat();
            $stats->intake = $req->get("intake", null);
            $stats->adopted = $req->get("adopted", null);
            $stats->total = $req->get("total", null);
            $stats->euthanized = $req->get("euthanized", null);
            $stats->date = $currentDate;
            $stats->save();
        }
        
        return redirect("/admin/settings");

    }

    public function addUser(Request $req){
        $fname = $req->get("first_name", false);
        $lname = $req->get("last_name", false);
        $pwd = $req->get("password", false);
        $pwdConfirm = $req->get("password_confirm", false);
        $email = $req->get("email", false);

        if($fname && $lname && $pwd && $pwdConfirm && $email){
            // check that there's not a user with this email
            $count = User::where("email", 'LIKE', $email)->count();
            if($count > 0){
                return view("admin/user-form", ["error" => "This email is already taken."]);
            }
            if($pwd === $pwdConfirm){
                $user = new User();
                $user->first_name = $fname;
                $user->last_name = $lname;
                $user->password = bcrypt($pwd);
                $user->email = $email;
                $user->save();
                return redirect("/admin/settings");
            } else{
                return view("admin/user-form", ["error" => "Please enter matching passwords."]);
            }
        } else{
            return view("admin/user-form", ["error" => "Please fill out all fields"]);
        }
    }

    public function deleteUser($id){
        User::destroy([$id]);
        return redirect('/admin/settings');
    }
}



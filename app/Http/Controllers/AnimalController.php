<?php

namespace HCWS\Http\Controllers;

use Illuminate\Http\Request;

use HCWS\Models\Animal;
use HCWS\Models\AnimalPhoto;
use HCWS\Models\Photo;
use HCWS\Models\AnimalType;

class AnimalController extends Controller
{

    public function view($id){
        $animal = Animal::with('animalPhotos.photo', 'type')->find($id);

        if(isset($animal)){
            $data = array("animal"=>$animal);
            return view('view-animal', $data);
        } else{
            // animal could not be found
            return redirect('/animals/adoptable');
        }
    }

    public function adoptable(Request $req){
        $pageSize = 6;
        $animals = Animal::with('animalPhotos.photo', 'type')->where('adopted', false)->paginate($pageSize);

        $data = array("animals"=>$animals, "pageTitle"=>"Adoptable Animals");

        return view('animal-list', $data);
    }

    public function adopted(Request $req){
        $pageSize = 6;
        $animals = Animal::with('animalPhotos.photo', 'type')->where('adopted', true)->paginate($pageSize);

        $data = array("animals"=>$animals, "pageTitle"=>"Recently Adopted Animals");

        return view('animal-list', $data);
    }

    /**
     * Returns the form for adding an animal
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $req){
        $data = array();
        $types = AnimalType::all();
        $data['types'] = $types;

        $animal = new Animal();
        $data['animal'] = $animal;

        $data['id'] = -1;

        return view('admin/animal-form', $data);
    }

    /**
     * Returns the form for updating the animal with the specified id
     * @param Request $req
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id){
        $data = array();
        $types = AnimalType::all();
        $data['types'] = $types;

        $animal = Animal::with('animalPhotos.photo', 'type')->find($id);
        $data['animal'] = $animal;

        $data['id'] = $id;

        return view('admin/animal-form', $data);
    }

    /**
     * Updates or adds a new animal
     * @param Request $req
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateAnimal(Request $req){
        
        $animal_id = $req->get("animal_id");
        if($animal_id){
            $animal = Animal::find($animal_id);
        } else{
            $animal = new Animal();
        }

        $animal->name = $req->get("name", "");
        $animal->breed = $req->get("breed", "");
        $animal->animal_type_id = $req->get("animal_type_id", "");
        $animal->adopted = $req->get("adopted", "0") == "1" ? true : false;
        $animal->adoption_date = new \DateTime($req->get("adoption_date", new \DateTime('now')));
        $animal->adopter_name = $req->get("adopter_name", "");
        $animal->description = $req->get("description", "");

        $animal->save();


        $deleted_photo_ids = array_map('trim', explode(",", $req->get("deleted_photo_ids", "")));

        foreach($deleted_photo_ids as $id){
            if(strlen($id) > 0){
                $photo = Photo::find(trim($id));
                \Cloudinary\Uploader::destroy($photo->name); // removes image from cloudinary storage
                Photo::destroy([trim($id)]);
            }
        }

        $photo_ids = array_map('trim', explode(",", $req->get("upload_ids", "")));
        foreach($photo_ids as $id){
            if(strlen($id) > 0) {
                $upload_public_id = trim($id);
                $photo = new Photo();
                $photo->name = $upload_public_id;
                $photo->url = "https://res.cloudinary.com/dt1ajug87/image/upload/" . $upload_public_id . ".jpg";
                $photo->save();

                $animal_photo = new AnimalPhoto();
                $animal_photo->animal_id = $animal->id;
                $animal_photo->photo_id = $photo->id;
                $animal_photo->save();
            }
        }

        $animal->save();

        return redirect("/admin/animals");
    }

    public function deleteAnimal($id){
        Animal::destroy([$id]);
        return redirect('/admin/animals');
    }
}

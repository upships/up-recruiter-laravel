<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $appends = ['name', 'properties'];

    public function user()	{

    	return $this->belongsTo('App\User');
    }

    public function position()  {

        return $this->belongsTo('App\Models\Data\Position');
    }

    public function applications()  {
        return $this->hasMany('App\Models\Recruiting\Application');
    }

    public function passports()  {
        return $this->hasMany('App\Models\Profile\Passport');
    }

    public function visas() {
        return $this->hasMany('App\Models\Profile\Visa');
    }
    
    public function certificates()	{
    	return $this->hasMany('App\Models\Profile\ProfileCertificate');
    }

    public function works()	{
    	return $this->hasMany('App\Models\Profile\ProfileWork');
    }

    public function ships()	{
    	return $this->hasMany('App\Models\Profile\ProfileShip');
    }

    public function documents()	{
    	return $this->hasMany('App\Models\Profile\ProfileDocument');
    }

    public function document_requests()	{
    	return $this->hasMany('App\Models\Profile\ProfileDocumentRequest');
    }

    public function education()	{
    	return $this->hasMany('App\Models\Profile\ProfileEducation');
    }

    public function extras()	{
    	return $this->hasMany('App\Models\Profile\ProfileExtra');
    }

    
    public function languages()	{
    	return $this->hasMany('App\Models\Profile\ProfileLanguage');
    }

    public function dp()	{
    	return $this->hasMany('App\Models\Profile\Dp');
    }

    public function seaman_books()	{
    	return $this->hasMany('App\Models\Profile\SeamanBook');
    }

    public function coc()	{
    	return $this->hasOne('App\Models\Profile\Coc');
    }

    public function coes()   {
        return $this->hasMany('App\Models\Profile\Coe');
    }

    public function country()   {
        return $this->belongsTo('App\Models\Data\Country');
    }

    public function nationality()   {
        return $this->belongsTo('App\Models\Data\Country', 'country_of_nationality');
    }

    public function native_language()   {
        return $this->belongsTo('App\Models\Data\Language', 'native_language');
    }

    public function stcw_regulations()	{
    	
    	return $this->hasMany('App\Models\Profile\CocStcwRegulation');
    }


    public function getNameAttribute()  {

        return $this->user->name;
    }

    public function getPropertiesAttribute()    {

        // Return all the properties of the profile:

        // Format:

        //     property: {value1, value2}

        // Properties: stcw_regulations, languages, country, state, city, seaman book, dp

        // They can be: boolean, scale, specific array_values

        $properties = [];

        if(count($this->stcw_regulations) > 0) {

            $properties[] = [
                                'name' => 'stcw_regulations',
                                'label' => 'STCW Regulations',
                                'type' => 'value',
                                'values' => $this->stcw_regulations()->get()->map( function($item) {

                                                return ['id' => $item->stcw_regulation->id, 'value' => $item->stcw_regulation->regulation, 'country' => null, 'valid' => true];
                                            }),
                            ];
        }

        if(count($this->seaman_books) > 0) {

            $properties[] = [
                                'name' => 'seaman_books',
                                'label' => 'Seaman Book',
                                'type' => 'value',
                                'values' => $this->seaman_books()->get()->map( function($item) {

                                                return ['id' => $item->seaman_book_type->id, 'value' => $item->seaman_book_type->label, 'country' => null, 'valid' => true];
                                            }),
                            ];
        }

        if(count($this->languages) > 0) {

            $properties[] = [
                                'name' => 'languages',
                                'label' => 'Languages',
                                'type' => 'scale',
                                'values' => $this->languages()->get()->map( function($item) {

                                                return ['id' => $item->language->code, 'value' => $item->language->label, 'scale' => $item->level , 'country' => null];
                                            }),
                            ];
        }

        if(count($this->certificates) > 0) {

            $properties[] = [
                                'name' => 'certificate_types',
                                'label' => 'Certificates',
                                'type' => 'value',
                                'values' => $this->certificates()->get()->map( function($item) {

                                                return ['id' => $item->certificate_type->id, 'value' => $item->certificate_type->label, 'country' => null, 'valid' => true];
                                            }),
                            ];
        }

        // Dynamic positioning

        if(count($this->dp) > 0) {

            $properties[] = [
                                'name' => 'dp',
                                'label' => 'Dynamic Positioning',
                                'type' => 'value',
                                'values' => $this->dp()->get()->map( function($item) {

                                                return ['id' => $item->dp_type->id, 'value' => $item->dp_type->label, 'country' => null, 'valid' => true];
                                            }),
                            ];
        }

        // Experience on ships

        if(count($this->ships) > 0) {

            $properties[] = [
                                'name' => 'ship_types',
                                'label' => 'Ships',
                                'type' => 'value',
                                'values' => $this->ships()->get()->map( function($item) {

                                                return ['id' => $item->ship_type->id, 'value' => $item->ship_type->label, 'country' => null];
                                            }),
                            ];
        }

        // Country

        if(count($this->country) > 0) {

            $properties[] = [
                                'name' => 'country',
                                'label' => 'Country',
                                'type' => 'value',
                                'values' => [['id' => $this->country->code, 'value' => $this->country->name, 'country' => null]],
                            ];
        }

        // Location in a country

        if($this->state) {

            $properties[] = [
                                'name' => 'state',
                                'label' => 'State',
                                'type' => 'value',
                                'values' => [['id' => $this->state, 'value' => $this->state, 'country' => null]],
                            ];
        }

        return $properties;

    }
}
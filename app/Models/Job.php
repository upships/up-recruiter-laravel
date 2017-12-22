<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['position_id', 'ship_type_id', 'instructions', 'status', 'step', 'expires_at', 'description', 'rotation', 'slug', 'salary', 'visibility', 'vacancies'];

    protected $appends = ['date', 'elapsed_time', 'visibility_label', 'status_label', 'expiration_date', 'full_expiration_date', 'filters', 'identifier'];

    public function getRouteKeyName() {

        return 'slug';
    }

    public function getSlug()   {

        // Checks if job has Slug
        if(!$this->slug)    {

            // Label
            $this->slug = str_slug($this->position->label . ' ' . str_random(5));
            $this->save();
        }

        return $this->slug;
    }

    public function company()	{

    	return $this->belongsTo('App\Models\Company');
    }

    public function recruiter() {

        return $this->belongsTo('App\Models\Company\Recruiter');
    }

    public function country()	{

    	return $this->belongsTo('App\Models\Data\Country');
    }

    public function position()	{

    	return $this->belongsTo('App\Models\Data\Position');
    }

    public function benefits()	{

    	return $this->hasMany('App\Models\Job\JobBenefit');
    }

    public function ship_type() {

        return $this->belongsTo('App\Models\Data\ShipType');
    }

    public function requirements()	{

    	return $this->hasMany('App\Models\Job\JobRequirement');
    }

    public function languages()  {

        return $this->hasMany('App\Models\Job\JobLanguage');
    }

    public function ship_types()    {

        return $this->hasMany('App\Models\Job\JobShipType');
    }

    public function experiences()	{

    	return $this->hasMany('App\Models\Job\JobExperience');
    }

    public function seaman_book_types()	{

    	return $this->hasMany('App\Models\Job\JobSeamanBookType');
    }

    public function stcw_regulations()	{

    	return $this->hasMany('App\Models\Job\JobStcwRegulation');
    }

    public function certificate_types()	{

    	return $this->hasMany('App\Models\Job\JobCertificateType');
    }


    public function applications()	{

    	return $this->hasMany('App\Models\Recruiting\Application');
    }

    public function selection()	{

    	return $this->hasOne('App\Models\Recruiting\Selection');
    }

    public function getDateAttribute()  {

        return $this->created_at->format('d/M');
    }

    public function getElapsedTimeAttribute()  {

        return $this->created_at->diffForHumans();
    }


    public function getStatusLabelAttribute()   {

        // 0 - not published, 1 - published, 2 - archived, 666 - cancelled

        switch($this->status)   {

            case 0:
                $label = 'Not published';
            break;

            case 1:
                $label = 'Published';
            break;

            case 2:
                $label = 'Closed';
            break;

            case 66:
                $label = 'Archived';
            break;

            case 666:
                $label = 'Cancelled';
            break;

            default:
                $label = 'Not published';
        }

        return $label;
    }

    public function getVisibilityLabelAttribute()   {

        // 1 - visible, 2 - private, 3 - confidential company

        switch($this->visibility)   {

            case 1:
                $label = 'Publicly visible';
            break;

            case 2:
                $label = 'Confidential company';
            break;

            case 3:
                $label = 'Private';
            break;

            default:
                $label = 'Publicly visible';
        }

        return $label;
    }

    public function getExpirationDateAttribute()    {

        // Checks if job has Slug
        if(!$this->expires_at)    {

            // Label
            $this->expires_at = \Carbon\Carbon::create()->addDays(30);
            $this->save();
        }

        return \Carbon\Carbon::parse($this->expires_at)->format('d/M');
    }

    public function getFullExpirationDateAttribute()    {

        // Checks if job has Slug
        if(!$this->expires_at)    {

            // Label
            $this->expires_at = \Carbon\Carbon::create()->addDays(30);
            $this->save();
        }

        return \Carbon\Carbon::parse($this->expires_at)->format('m/d/Y');
    }

    public function getFiltersAttribute()   {

        $filters = [];

        // Seaman book types
        if(count($this->seaman_book_types) > 0) {

            $filters[] = [
                            'name' => 'seaman_book_types',
                            'label' => 'Seaman Book Types',
                            'type' => 'value',
                            'condition' => 'or',
                            'values' => $this->seaman_book_types()->get()->map( function($seaman_book_type) {
                                return ['id' => $seaman_book_type->seaman_book_type->id, 'label' => $seaman_book_type->seaman_book_type->label];
                            })

                         ];
        }

        // STCW Regulations
        if(count($this->stcw_regulations) > 0) {

            $filters[] = [
                            'name' => 'stcw_regulations',
                            'label' => 'STCW Regulations',
                            'type' => 'value',
                            'condition' => 'and',
                            'values' => $this->stcw_regulations()->get()->map( function($stcw_regulation) {
                                return ['id' => $stcw_regulation->stcw_regulation->id, 'label' => $stcw_regulation->stcw_regulation->regulation];
                            })

                         ];
        }

        // Ship types
        if(count($this->ship_types) > 0) {

            $filters[] = [
                            'name' => 'ship_types',
                            'label' => 'Ship Types',
                            'type' => 'scale',
                            'condition' => 'or',
                            'values' => $this->ship_types()->get()->map( function($ship_type) {
                                return ['id' => $ship_type->ship_type->id, 'label' => $ship_type->ship_type->label, 'scale' => $ship_type->months];
                            })

                         ];
        }

        // Certificate Types
        if(count($this->certificate_types) > 0) {

            $filters[] = [
                            'name' => 'certificate_types',
                            'label' => 'Certificates',
                            'type' => 'value',
                            'condition' => 'and',
                            'values' => $this->certificate_types()->get()->map( function($certificate_type) {
                                return ['id' => $certificate_type->certificate_type->id, 'label' => $certificate_type->certificate_type->label];
                            })

                         ];
        }

        // Languages
        if(count($this->languages) > 0) {

            $filters[] = [
                            'name' => 'languages',
                            'label' => 'Languages',
                            'type' => 'scale',
                            'condition' => 'and',
                            'values' => $this->languages()->get()->map( function($language) {

                                return ['id' => $language->language->id, 'label' => $language->language->label, 'scale' => $language->level];
                            })

                         ];
        }

        return $filters;

    }

    function getIdentifierAttribute() {

        return $this->getSlug();
    }
}

<?php

class CountryHouseProject {
    public function site_has_old_building() {}
    public function site_has_trash() {}
    public function need_foundation() {}
    public function need_landscaping() {}
}

interface Component {
    public function job_execution(CountryHouseProject $house): CountryHouseProject;
}

class Builder implements Component {
    public function job_execution(CountryHouseProject $house): CountryHouseProject
    {
        //house building
        return $house;
    }
}

abstract class Decorator implements Component {
    protected Component $component;

    public function __construct(Component $component) {
        $this->component = $component;
    }

    public function job_execution(CountryHouseProject $house): CountryHouseProject
    {
        //some works
        return $house;
    }
}

class HouseSiteCleanerDecorator extends Decorator {
    public function job_execution(CountryHouseProject $house): CountryHouseProject
    {
        //clean up house site
        return parent::job_execution($house);
    }
}
class DemolitionDecorator extends Decorator {
    public function job_execution(CountryHouseProject $house): CountryHouseProject
    {
        //demolition of old building
        return parent::job_execution($house);
    }
}
class FoundationDiggingDecorator extends Decorator {
    public function job_execution(CountryHouseProject $house): CountryHouseProject
    {
        //foundation digging
        return parent::job_execution($house);
    }
}
class LandscapingDecorator extends Decorator {
    public function job_execution(CountryHouseProject $house): CountryHouseProject
    {
        parent::job_execution($house);
        //landscaping
        return $house;
    }
}

$project = new CountryHouseProject();
$builder = new Builder();
if ($project->site_has_trash()) {
    $builder = new HouseSiteCleanerDecorator($builder);
}
if ($project->site_has_old_building()) {
    $builder = new DemolitionDecorator($builder);
}
if ($project->need_foundation()) {
    $builder = new FoundationDiggingDecorator($builder);
}
if ($project->need_landscaping()) {
    $builder = new LandscapingDecorator($builder);
}
$builder->job_execution($project);

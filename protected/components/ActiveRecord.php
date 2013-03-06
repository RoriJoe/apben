<?php

class ActiveRecord extends CActiveRecord {

    public function defaultScope() {
        $scope = new CDbCriteria();

        foreach ($this->behaviors() as $name => $value) {
            $behavior = $this->asa($name);
            if ($behavior->enabled && method_exists($behavior,'defaultScope')) {
                $scope->mergeWith($behavior->defaultScope());
            }
        }
        return $scope;
    }
}
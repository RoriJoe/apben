<?php

class RevisionBehavior extends CActiveRecordBehavior {

    public function lastRevision($condition = "") {
        $model = $this->getOwner();
        $last = $model->find(array('order'=>'version desc','condition'=>'trash = 0'));
        if ($last != null) {
            return $last->version;
        } else {
            return 0;
        }
    }
    
    public function beforeSave() {
        $model = $this->getOwner();
        $model_class = get_class($model);

        if (!$model->isNewRecord) {
            if (!$model->deleted) {
                $new = new $model_class;
                $new->attributes = $model->attributes;
                $new->version = $new->version + 1;
                $new->save();
            }

            $model->attributes = $this->original_attributes;
        }
    }

    private $original_attributes = array();

    public function afterFind() {
        $model = $this->getOwner();
        $this->original_attributes = $model->attributes;

        if ($model->uid == 0) {
            $model->saveAttributes(array(
                'uid' => $model->id
            ));
        }
    }

    public function defaultScope() {
        $model = $this->getOwner();

        return array(
            'condition' => 'trash = 0 and version=(SELECT MAX(version) FROM ' . $model->tableName() . ' i where i.uid = t.uid)',
            'order' => 'uid'
        );
    }

    public function getLatest() {
        $model = $this->getOwner();
        $model_class = get_class($model);

        $latest = call_user_func(array($model_class, 'model'))->find(array(
            'condition' => 'uid = ' . $model->uid,
            'order' => 'version desc'
        ));

        return $latest;
    }

    public function getDeleted() {
        $model = $this->getOwner();
        $latest = $model->latest;

        if ($latest != null && !$latest->trash) {
            return false;
        }
        return true;
    }

    public function beforeDelete($event) {
        $model = $this->getOwner();
        $model_class = get_class($model);

        if (!$model->deleted) {
            $latest = $model->latest;
            $new = new $model_class;
            $new->attributes = $model->attributes;
            $new->version = $latest->version + 1;
            $new->trash = 1;
            $new->save();
        }

        $event->isValid = false;
    }

}
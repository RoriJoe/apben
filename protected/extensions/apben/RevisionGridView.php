<?php
Yii::import('zii.widgets.grid.CGridView');
Yii::import('bootstrap.widgets.TbDataColumn');
Yii::import('bootstrap.widgets.TbGridView');

/**
 * Bootstrap Zii grid view.
 */
class RevisionGridView extends TbGridView {

    /**
    private function generateSummaryText() {
        //var_dump();
        $model = call_user_func(array($this->dataProvider->modelClass,'model'));
        ob_start();
        ?>
        <div style="float:none;background:#f9f9f9;border-radius:4px;text-align:left;padding:5px 10px;">
            Revisi ke:
            <a href="#"><i class="icon-step-backward"></i></a>
            <a href="#"><i class="icon-chevron-left"></i></a>
            <b><?php echo $model->lastRevision(); ?></b>
            <a href="#"><i class="icon-chevron-right"></i></a>
            <a href="#"><i class="icon-step-forward"></i></a>
        </div>
        <?php
        return ob_get_clean();
    }
     */

        public function init() {

        $this->type = "striped condensed";
        $this->emptyText = '<center><br><br><br>&mdash; Data masih kosong &mdash;<br><br><br><br></center> ';
        parent::init();
        $this->summaryText = '';
    }

}
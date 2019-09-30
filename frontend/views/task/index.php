<?php

use common\models\Task;
use common\models\TaskPriority;
use common\models\TaskStatus;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать задачу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'projectTitle',
                'label' => 'Проект',
                'value' => function( Task $model) {
                    if (!empty($model->project)) {
                        return $model->project->title;
                    }
                    return null;
                }
            ],
            [
                'attribute' => 'authorEmail',
                'label' => 'Автор',
                'value' => function(Task $model) {
                    return $model->author->email;
                }
            ],
            [
                'attribute' => 'workerEmail',
                'label' => 'Исполнитель',
                'value' => function(Task $model) {
                    return $model->worker->email;
                }
            ],
            [
                'attribute' => 'deadLine_date',
                'format' => 'raw',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'deadLine_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (Task $model) {
                    return Yii::$app->formatter->asDate($model->deadLine_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute' => 'start_date',
                'format' => 'raw',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'start_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (Task $model) {
                    return Yii::$app->formatter->asDate($model->start_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute' => 'end_date',
                'format' => 'raw',
                'filter' => \kartik\date\DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'end_date',
                    'language' => 'ru',
                    'pluginOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'dd.mm.yyyy',
                    ]
                ]),
                'value' => function (Task $model) {
                    return Yii::$app->formatter->asDate($model->end_date, 'php:d.M.Y');
                }
            ],
            [
                'attribute' => 'status_id',
                'filter' => TaskStatus::getStatusTitle(),
                'value' => function( Task $model) {
                    return $model->status->title;
                }
            ],
            [
                'attribute' => 'priority_id',
                'filter' => TaskPriority::getPriorityTitle(),
                'value' => function(Task $model) {
                    return $model->priority->title;
                }
            ],
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?=\common\widgets\chatWidget\ChatWidget::widget();?>


</div>

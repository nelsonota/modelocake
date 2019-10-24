<?php
namespace App\Model\Behavior;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;


class JournalBehavior extends Behavior
{
    public function beforeSave(Event $event, EntityInterface $entity)
    {
        if (!$entity->isNew())
        {
            $original_changed = $entity->extractOriginalChanged($entity->visibleProperties());
            if (count($original_changed))
            {
                $alias = substr($event->getSubject()->getTable(), 0, 4);
                $journal = [
                    'jour_model' => $entity->getSource(),
                    'jour_model_codigo' => $entity->get($alias.'_codigo'),
                    'jdet_journal_detail' => []
                ];
                foreach ($original_changed as $field => $value)
                {
                    $journal['jdet_journal_detail'][] = [
                        'jdet_property' => 'attr',
                        'jdet_prop_key' => $field,
                        'jdet_old_value' => $value,
                        'jdet_value' => $entity->{$field}
                    ];
                }
                $this->JourJournal = TableRegistry::get('JourJournal', ['className' => 'App\Model\Table\JourJournalTable']);
                $jourJornal = $this->JourJournal->newEntity($journal, ['contain' => 'JdetJournalDetail']);
                $this->JourJournal->save($jourJornal);
                unset($this->JourJournal);
            }
        }
    }

    public function afterDelete(Event $event, EntityInterface $entity, $options)
    {
        $jsonOptions = JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT |
            JSON_PARTIAL_OUTPUT_ON_ERROR;
        $data = json_encode($entity, $jsonOptions);
        $alias = substr($event->getSubject()->getTable(), 0, 4);
        $journal = [
            'jour_model' => $entity->getSource(),
            'jour_model_codigo' => $entity->get($alias.'_codigo'),
            'jour_json_data' => $data
        ];
        $this->JourJournal = TableRegistry::get('JourJournal', ['className' => 'App\Model\Table\JourJournalTable']);
        $jourJornal = $this->JourJournal->newEntity($journal);
        $this->JourJournal->save($jourJornal);
        unset($this->JourJournal);
    }
}
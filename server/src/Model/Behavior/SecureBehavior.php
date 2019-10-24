<?php
namespace App\Model\Behavior;

use Cake\Datasource\EntityInterface;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\Core\Configure;


class SecureBehavior extends Behavior
{
    public function beforeSave(Event $event, EntityInterface $entity)
    {
        $prefix = substr($event->getSubject()->getTable(), 0, 4);
        if ($entity->isNew())
        {
            $entity->set($prefix.'_created', date('Y-m-d H:i:s'));
            $current_usua_codigo = $entity->get($prefix.'_usua_codigo');
            if (empty($current_usua_codigo) && isset($_SESSION['Auth']['User']['usua_codigo']))
            {
                $entity->set($prefix.'_usua_codigo', $_SESSION['Auth']['User']['usua_codigo']);
            }
            $current_empr_codigo = $entity->get($prefix.'_empr_codigo');
            if (empty($current_empr_codigo) && isset($_SESSION['Auth']['User']['usua_empr_codigo']))
            {
                $entity->set($prefix.'_empr_codigo', $_SESSION['Auth']['User']['usua_empr_codigo']);
            }
        } else {
            $entity->set($prefix.'_modified', date('Y-m-d H:i:s'));
        }
    }

    public function beforeFind($event, $query, $options, $primary)
    {
        $prefix = substr($event->getSubject()->getTable(), 0, 4);
        $alias = $event->getSubject()->getRegistryAlias();
        $schema = $event->getSubject()->getSchema();
        
        if ($schema->getColumn($prefix.'_empr_codigo')) {
            if ($prefix != 'usua') {
                if (!empty($_SESSION['Auth']['User']['usua_empr_codigo'])) {
                    $query->where([$alias.'.'.$prefix.'_empr_codigo' => $_SESSION['Auth']['User']['usua_empr_codigo']]);
                }
            }
        }
        // if ($schema->getColumn($prefix.'_deleted')) {
        //     $query->where([$alias.'.'.$prefix.'_deleted IS' => NULL]);
        // }
    }
}
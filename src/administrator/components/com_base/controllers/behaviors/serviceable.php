<?php

/**
 * Serviceable Behavior.
 *
 * Specializes some of the service methods
 *
 * @category   Anahita
 *
 * @author     Arash Sanieyan <ash@anahitapolis.com>
 * @author     Rastin Mehr <rastin@anahitapolis.com>
 * @license    GNU GPLv3 <http://www.gnu.org/licenses/gpl-3.0.html>
 *
 * @link       http://www.GetAnahita.com
 */
class ComBaseControllerBehaviorServiceable extends LibBaseControllerBehaviorServiceable
{
    /**
     * Return the item.
     *
     * @param KCommandContext $context Context parameter
     *
     * @return mixed
     */
    protected function _actionRead(KCommandContext $context)
    {
        //create an empty entity for the form layout;
        if (!$this->getItem()) {
            $this->setItem($this->getRepository()->getEntity()->reset());
        }

        return $this->getItem();
    }

    /**
     * Create a new entity.
     *
     * @param KCommandContext $context Context parameter
     *
     * @return AnDomainEntityAbstract
     */
    protected function _actionAdd(KCommandContext $context)
    {
        return;
    }

    /**
     * Edits an entity.
     *
     * @param KCommandContext $context Context parameter
     *
     * @return AnDomainEntityAbstract
     */
    protected function _actionEdit(KCommandContext $context)
    {
        $entity = parent::_actionEdit($context);

        $data = $context->data;

        if ($entity->isDictionariable() && $data->meta) {
            foreach ($data->meta as $key => $value) {
                $entity->setValue($key, $value);
            }
        }

        return $entity;
    }

    /**
     * Return a set of entities.
     *
     * @param KCommandContext $context Context parameter
     *
     * @return AnDomainEntitysetAbstract
     */
    protected function _actionBrowse(KCommandContext $context)
    {
        $data = $context->data;

        $context->append(array(
            'query' => $this->getRepository()->getQuery(),
        ));

        $query = $context->query;

        $query->order($this->sort, $this->direction)->limit($this->limit, $this->limitstart);

        $query->keyword = $this->search;

        if ($this->getRepository()->hasBehavior('parentable')) {
            if ($this->getState()->parent) {
                $query->parent($this->getState()->parent);
            } elseif ($this->pid == -1) {
                $query->parent(null);
            }
        }

        return $this->getState()->setList($query->toEntitySet())->getList();
    }
}

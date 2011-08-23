<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\InvoiceBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class InvoiceAdmin extends Admin
{
    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with($this->trans('form_group_main_label', array(), 'SonataInvoiceBundle'))
                ->add('reference')
                ->add('currency')
                ->add('status')
            ->end()
            ->with($this->trans('form_group_billing_label', array(), 'SonataInvoiceBundle'), array('collapsed' => true))
                ->add('name')
                ->add('phone')
                ->add('address1')
                ->add('address2')
                ->add('address3')
                ->add('city')
                ->add('postcode')
                ->add('country', 'country')
                ->add('fax')
                ->add('email')
                ->add('mobile')
            ->end()
        ;

        if (!$this->isChild()) {
            $formMapper
                ->with($this->trans('form_group_misc_label', array(), 'SonataInvoiceBundle'))
                    ->add('customer', 'sonata_type_model', array(), array('edit' => 'list'))
                ->end()
            ;
        }
    }

    public function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('id')
            ->addIdentifier('reference')
            ->add('customer')
            ->add('status')
            ->add('totalExcl')
        ;
    }
}
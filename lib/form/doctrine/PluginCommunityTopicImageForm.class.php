<?php

/**
 * PluginCommunityTopicImage form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginCommunityTopicImageForm extends BaseCommunityTopicImageForm
{
  public function setup()
  {
    parent::setup();

    unset($this['id']);
    $this->useFields();

    $key = 'photo';

    $options = array(
        'file_src'     => '',
        'is_image'     => true,
        'with_delete'  => true,
        'delete_label' => sfContext::getInstance()->getI18N()->__('remove the cu
rrent photo'),
        'label'        => false,
        'edit_mode'    => !$this->isNew(),
        );

    if (!$this->isNew())
    {
      sfContext::getInstance()->getConfiguration()->loadHelpers('Partial');
      $options['template'] = get_partial('communityTopic/formEditImage', array('image' =>
 $this->getObject()));
      $this->setValidator($key.'_delete', new sfValidatorBoolean(array('required
' => false)));
    }

    $this->setWidget($key, new sfWidgetFormInputFileEditable($options, array('si
ze' => 40)));
    $this->setValidator($key, new opValidatorImageFile(array('required' => false
)));
  }

  public function updateObject($values = null)
  {
    error_log(var_dump(get_object_vars($this)));/*
    if ($values['photo'] instanceof sfValidatedFile)
    {
      if (!$this->isNew())
      {
        unset($this->getObject()->File);
      }

      $file = new File();
      $file->setFromValidatedFile($values['photo']);

      $this->getObject()->setFile($file);
    }
    else
    {
      if (!$this->isNew() && !empty($values['photo_delete']))
      {
        $this->getObject()->getFile()->delete();
      }

      $this->getObject()->setFile(null);
    }*/
  }
}
<?
/*
This php script reads no. of instances of rabbitmq consumer from MessageQueues.enum.class.php to be run and executes that many instances of cron:cronConsumeQueueMessage.
*/

class cronExecuteBufferInstantNotificationsTask extends sfBaseTask
{
  /**
   * 
   * Configuration details for cron:cronRabbitmqRecovery
   * 
   * @access protected
   * @param none
  */
  protected function configure()
  {
    $this->namespace           = 'cron';
    $this->name                = 'cronExecuteBufferInstantNotifications';
    $this->briefDescription    = 'reads no. of instances of rabbitmq consumer from MessageQueues.enum.class.php to be run and executes that many instances of cronConsumeQueueMessage.';
    $this->detailedDescription = <<<EOF
     The [cronexecuteConsumer|INFO] reads no. of instances of rabbitmq consumer from MessageQueues.enum.class.php to be run and executes that many instances of cronConsumeQueueMessage:
     [php symfony cron:cronExecuteBufferInstantNotifications] 
EOF;
    $this->addOptions(array(
        new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', 'jeevansathi')
    ));
  }

  /**
   * 
   * Function for executing cron. Executes cron and sets memory and disk alarms for First and Second Server as false
   * 
   * @access protected
   * @param $arguments,$options
   */
  protected function execute($arguments = array(), $options = array())
  {
    if (!sfContext::hasInstance())
    sfContext::createInstance($this->configuration);
    JsMemcache::getInstance()->set("mqMemoryAlarmFIRST_SERVER",false);
    JsMemcache::getInstance()->set("mqMemoryAlarmSECOND_SERVER",false);
    JsMemcache::getInstance()->set("mqDiskAlarmFIRST_SERVER",false);
    JsMemcache::getInstance()->set("mqDiskAlarmSECOND_SERVER",false);
    $instancesNum=MessageQueues::BUFFER_INSTANT_NOTIFICATION_CONSUMER_COUNT;
    for($i=1;$i<=$instancesNum;$i++)
    {
      passthru(JsConstants::$php5path." ".MessageQueues::CRON_BUFFER_INSTANT_NOTIFICATION_START_COMMAND." > /dev/null &");
    }
	}
}
?>
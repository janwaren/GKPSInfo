<?php
namespace common\models;
 
use common\models\ValueHelpers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;
 
class PermissionHelpers 
{                                      
                   
      public static function requireUpgradeTo($userTypeName)
      {
                        
          if (!ValueHelpers::isUserTypeMatch($userTypeName)) { 
                            
               return Yii::$app->getResponse()->redirect(Url::to(['upgrade/index']));
                            
          }
          
      }
                                       
      public static function requireStatus($status_name)
      {
                        
           return ValueHelpers::isUserStatusMatch($status_name);
           
      }
                    
      public static function requireRole($userRoleName)
      {
          
            return ValueHelpers::isUserRoleMatch($userRoleName);
                    
      }
                    
       public static function requireMinimumRole($userRoleName, $userId=null)                                
       {
          
             if (ValueHelpers::isUserRoleNameValid($userRoleName)){
                 
                    if ($userId == null) {
                        
                      $userRoleValue = ValueHelpers::getRoleValueFromUser();     
                        
                    }  else {
                        
                       $userRoleValue = ValueHelpers::getRoleValueFromUser($userId);
                          
                    }
                    
                     return $userRoleValue >= ValueHelpers::getUserRoleValue($userRoleName) ? true : false;                 
                 
             } else {
                 
                 return false;
                 
             }
             
       }
       
       public static function userMustBeOwner($model_name, $model_id)
       {
                       
           $connection = \Yii::$app->db;
           $userid = Yii::$app->user->identity->id;
           $sql = "SELECT id FROM $model_name WHERE user_id=:userid AND id=:model_id";
           $command = $connection->createCommand($sql);
           $command->bindValue(":userid", $userid);
           $command->bindValue(":model_id", $model_id);
           
           if($result = $command->queryOne()) {
                            
                return true;
   
            } else {
                            
                return false;
 
            }
            
        }
                     
}
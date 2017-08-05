<?php
namespace common\models;

use yii;
use backend\models\UserRole;
use backend\models\UserStatus;
use backend\models\UserType;
use common\models\User;

/**
* 
*/
class ValueHelpers
{
	
	/* 
	 * ***************************************
	 * Methods to get values of UserRole
	 * ***************************************
	 */

	public static function isUserRoleMatch($userRoleName)
	{
		$userHasRoleName = Yii::$app->user->identity->userRole->user_role_name;
		return $userHasRoleName == $userRoleName ? true : false;
	}

	public static function getUserRoleValue($userRoleName)
	{
		$userRole = UserRole::find('user_role_value')
						->where(['user_role_name' => $userRoleName])
						->one();
		return isset($userRole->user_role_value) ? $userRole->user_role_value : false;
	}

	public static function getRoleValueFromUser($userId=null)
	{
		if ($userId == null)
		{
			$usersRoleValue = Yii::$app->user->identity->userRole->user_role_value;
			return isset($usersRoleValue) ? $usersRoleValue : false;
		} 
		else
		{
			$user = User::findOne($userId);
			$usersRoleValue = $user->userRole->user_role_value;
			return isset($usersRoleValue) ? $usersRoleValue : false;
		}
	}

	public static function isUserRoleNameValid($userRoleName)
	{
		$userRole = UserRole::find('user_role_name')
						->where(['user_role_name' => $userRoleName])
						->one();
		return isset($userRole -> user_role_name) ? true : false;
	}

	/* 
	 * ***************************************
	 * Methods to get values of UserStatus
	 * ***************************************
	 */

	public static function isUserStatusMatch($userStatusName)
	{
		$userHasStatusName = Yii::$app->user->identity->userStatus->user_status_name;
		return $userHasStatusName == $userStatusName ? true : false;
	}

	public static function getUserStatusId($userStatusName)
	{
		$userStatus = UserStatus::find('id')
						->where(['user_status_name' => $userStatusName])
						->one();
		return isset($userStatus->id) ? $userStatus->id : false;
	}

	/* 
	 * ***************************************
	 * Methods to get values of UserType
	 * ***************************************
	 */

	public static function isUserTypeMatch($userTypeName)
	{
		$userHasTypeName = Yii::$app->user->identity->userType->user_type_name;
		return $userHasTypeName == $userTypeName ? true : false;
	}


}

?>
<?php namespace App\Traits;

/**
 ***********************************************************************************
 * 此Trait中的方法用以完善权限系统的运行
 * <1> 敏感权限 默认创建者拥有
 * <2> 敏感权限 拥有者可授权给其他用户，如助理，也可撤销权限 
 ***********************************************************************************
 */

/**
 * Class EOwnerCheckTrait
 * @package App\Traits
 */
trait EOwnerCheckTrait
{
	/**
	 * 验证用户是否为相关实体的拥有者
	 */
	public function ownerCheck($user_id)
	{
		return (\Auth::user()->id == $user_id);
	}

	/**
	 * 验证登陆用户是否为相关实体的拥有者
	 */
	public function entityOwnerCheck($entity)
	{
		return (\Auth::user()->id == $entity->user_id);
	}

	/**
	 * 验证指定用户是否为相关实体的拥有者
	 */

	public function isEntityOwner($user, $entity)
	{
		return ($user->id == $entity->user_id);
	}	
}

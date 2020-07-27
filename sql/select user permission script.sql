/*select role_id from users where user_name = 'talha786';*/
select * from users
inner join role on users.id=role.id
inner join permissions on role.id=permissions.id
inner join roles_permissions on permissions.id=roles_permissions.role_id
where user_name = 'talha786';
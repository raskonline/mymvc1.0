# 创建guestbook数据表
DROP TABLE IF EXISTS guestbook;
CREATE TABLE IF NOT EXISTS guestbook(
  id INT(6) UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY COMMENT '留言编号',
  uname CHAR(20) NOT NULL COMMENT '用户姓名',
	uemail CHAR(50) NOT NULL COMMENT '用户email',
	uphone CHAR(11) NOT NULL COMMENT '用户联系电话',
  umessage CHAR(255) NOT NULL COMMENT '留言信息'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO guestbook VALUES(DEFAULT,'andy','andy@qq.com','05927788414','预约看感冒');
INSERT INTO guestbook VALUES(DEFAULT,'mike','mike@qq.com','05927788414','预约看感冒');
INSERT INTO guestbook VALUES(DEFAULT,'sindy','sin@qq.com','05927788414','预约看感冒');
INSERT INTO guestbook VALUES(DEFAULT,'jack','jack@qq.com','05927788414','预约看感冒');
INSERT INTO guestbook VALUES(DEFAULT,'hugo','hugo@qq.com','05927788414','预约看感冒');
INSERT INTO guestbook VALUES(DEFAULT,'张三','zs@qq.com','05927788414','预约看感冒2');
INSERT INTO guestbook VALUES(DEFAULT,'李四','ls@qq.com','05927788414','预约看感冒2');
INSERT INTO guestbook VALUES(DEFAULT,'王五','ww@qq.com','05927788414','预约看感冒2');
INSERT INTO guestbook VALUES(DEFAULT,'赵六','zz@qq.com','05927788414','预约看感冒2');
INSERT INTO guestbook VALUES(DEFAULT,'陈丽','cc@qq.com','05927788414','预约看感冒2');
SELECT * FROM guestbook;

SELECT COUNT(1) as total FROM guestbook;

SELECT * FROM guestbook WHERE uname LIKE  CONCAT('%','mi','%') ORDER BY id DESC LIMIT 1,5;

DELETE FROM guestbook WHERE id=1;

# 创建hpuser数据表
DROP TABLE IF EXISTS hpuser;
CREATE TABLE IF NOT EXISTS hpuser(
  uid INT UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY COMMENT '用户编号',
  uname CHAR(20) NOT NULL UNIQUE COMMENT '用户账号',
	upwd CHAR(32) NOT NULL COMMENT '用户密码',
	uemail CHAR(50) NOT NULL COMMENT '用户电子邮箱'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO hpuser VALUES(DEFAULT,'tom','123321','tom@qq.com');
SELECT * FROM hpuser WHERE uname='zs' AND upwd=md5('123') ;


# 创建sysuser数据表
DROP TABLE IF EXISTS sysuser;
CREATE TABLE IF NOT EXISTS sysuser(
  id INT UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY COMMENT '用户编号',
  name CHAR(20) NOT NULL UNIQUE COMMENT '用户账号',
	pwd CHAR(32) NOT NULL COMMENT '用户密码'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO sysuser VALUES(DEFAULT,'root',md5('rootkit')),(DEFAULT,'admin',md5('admin'));


SELECT * FROM sysuser WHERE name='root' AND pwd=md5('rootkit');
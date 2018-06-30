# 创建guestbook数据表
DROP TABLE IF EXISTS guestbook;
CREATE TABLE IF NOT EXISTS guestbook(
  id INT(6) UNSIGNED NOT NULL  AUTO_INCREMENT PRIMARY KEY COMMENT '留言编号',
  uname CHAR(20) NOT NULL COMMENT '用户姓名',
	uemail CHAR(50) NOT NULL COMMENT '用户email',
	uphone CHAR(11) NOT NULL COMMENT '用户联系电话'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

SELECT * FROM guestbook;


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
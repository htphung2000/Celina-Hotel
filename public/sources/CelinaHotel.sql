/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/11/2021 12:38:24 PM                        */
/*==============================================================*/


drop table if exists ACCOUNT;

drop table if exists APPLIED;

drop table if exists BILL;

drop table if exists CART;

drop table if exists DEPARTMENT;

drop table if exists EMPLOYEE;

drop table if exists ROOM;

drop table if exists ROOM_TYPE;

drop table if exists SALARY;

drop table if exists SALE;

/*==============================================================*/
/* Table: ACCOUNT                                               */
/*==============================================================*/
create table ACCOUNT
(
   ID                   int not null AUTO_INCREMENT,
   USERNAME             varchar(30) not null UNIQUE,
   PASS                 varchar(16) not null,
   USER_ROLE            varchar(10) not null,
   FULLNAME             varchar(30) not null,
   DOB                  date not null,
   GENDER               varchar(3) not null,
   PHONE                varchar(10),
   EMAIL                varchar(30),
   USER_ADDRESS         text,
   CREATED_AT           datetime not null,
   UPDATED_AT           datetime,
   primary key (ID)
);

/*==============================================================*/
/* Table: APPLIED                                               */
/*==============================================================*/
create table APPLIED
(
   APP_DAY              date not null,
   primary key (APP_DAY)
);

/*==============================================================*/
/* Table: BILL                                                  */
/*==============================================================*/
create table BILL
(
   ID_BILL              int not null AUTO_INCREMENT,
   ID_CART              int not null,
   CHECK_IN             datetime,
   EMP_CHECKIN          int,
   CHECK_OUT            datetime,
   EMP_CHECKOUT         int,
   CREATED_BILL_AT      datetime not null,
   BILL_STATUS          varchar(20) not null,
   primary key (ID_BILL)
);

/*==============================================================*/
/* Table: CART                                                  */
/*==============================================================*/
create table CART
(
   ID_CART              int not null AUTO_INCREMENT,
   ID                   int not null,
   ID_ROOM              int not null,
   ID_DEPARTMENT        int not null,
   START_ON             date not null,
   END_ON               date not null,
   BOOKING_STATUS       varchar(20) not null,
   primary key (ID_CART)
);

/*==============================================================*/
/* Table: DEPARTMENT                                            */
/*==============================================================*/
create table DEPARTMENT
(
   ID_DEPARTMENT        int not null AUTO_INCREMENT,
   DPM_NAME             varchar(50) not null,
   DPM_PHONE            varchar(10) not null,
   DPM_ADDRESS          text not null,
   primary key (ID_DEPARTMENT)
);

/*==============================================================*/
/* Table: EMPLOYEE                                              */
/*==============================================================*/
create table EMPLOYEE
(
   ID                   int not null,
   ID_DEPARTMENT        int not null,
   POS                  varchar(20) not null
);

/*==============================================================*/
/* Table: ROOM                                                  */
/*==============================================================*/
create table ROOM
(
   ID_ROOM              int not null,
   ID_DEPARTMENT        int not null,
   ROOMTYPE             varchar(20) not null,
   primary key (ID_ROOM, ID_DEPARTMENT)
);

/*==============================================================*/
/* Table: ROOM_TYPE                                             */
/*==============================================================*/
create table ROOM_TYPE
(
   ROOMTYPE             varchar(20) not null,
   PRICE                int not null,
   primary key (ROOMTYPE)
);

/*==============================================================*/
/* Table: SALARY                                                */
/*==============================================================*/
create table SALARY
(
   POS                  varchar(20) not null,
   SAL                  int not null,
   primary key (POS)
);

/*==============================================================*/
/* Table: SALE                                                  */
/*==============================================================*/
create table SALE
(
   ID_DEPARTMENT        int not null,
   APP_DAY              date not null,
   PERCENT              int not null
);

alter table BILL add constraint FK_REFERENCE_13 foreign key (ID_CART)
      references CART (ID_CART) on delete restrict on update restrict;

alter table CART add constraint FK_REFERENCE_11 foreign key (ID_ROOM, ID_DEPARTMENT)
      references ROOM (ID_ROOM, ID_DEPARTMENT) on delete restrict on update restrict;

alter table CART add constraint FK_REFERENCE_12 foreign key (ID)
      references ACCOUNT (ID) on delete restrict on update restrict;

alter table EMPLOYEE add constraint FK_ACC_EMP foreign key (ID)
      references ACCOUNT (ID) on delete restrict on update restrict;

alter table EMPLOYEE add constraint FK_REFERENCE_10 foreign key (ID_DEPARTMENT)
      references DEPARTMENT (ID_DEPARTMENT) on delete restrict on update restrict;

alter table EMPLOYEE add constraint FK_REFERENCE_8 foreign key (POS)
      references SALARY (POS) on delete restrict on update restrict;

alter table ROOM add constraint FK_CLASSIFY foreign key (ROOMTYPE)
      references ROOM_TYPE (ROOMTYPE) on delete restrict on update restrict;

alter table ROOM add constraint FK_REFERENCE_7 foreign key (ID_DEPARTMENT)
      references DEPARTMENT (ID_DEPARTMENT) on delete restrict on update restrict;

alter table SALE add constraint FK_REFERENCE_6 foreign key (ID_DEPARTMENT)
      references DEPARTMENT (ID_DEPARTMENT) on delete restrict on update restrict;

alter table SALE add constraint FK_REFERENCE_9 foreign key (APP_DAY)
      references APPLIED (APP_DAY) on delete restrict on update restrict;


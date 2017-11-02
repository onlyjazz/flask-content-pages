create sequence article_id;
create table articles (
    id   integer not null default nextval('article_id') primary key,
    post_author_id int  references users(id), -- logged in Flask customer admin| super admin
    post_date     timestamp default now(),
    post_content  varchar,
    post_title    varchar,
    post_excerpt  varchar,
    hit_count     int,
    tag    varchar,  -- yes, model supports one tag.
    created timestamp default now(),
    modified timestamp default now()
);
create index tag_id ON articles(tag);
ALTER TYPE entity_class ADD VALUE 'article' AFTER 'alert_rule';
INSERT INTO entity_types (id, name, type_class) VALUES (29,	    'Article',        'article');

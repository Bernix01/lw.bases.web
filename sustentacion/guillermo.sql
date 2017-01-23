SELECT usuario.id_usuario, info_usuario.*,count(curso_estudiante.id_curso) as cantidad from curso_estudiante,usuario
  LEFT JOIN info_usuario on info_usuario.id_usuario = usuario.id_usuario
where usuario.id_usuario = curso_estudiante.id_estudiante AND
      curso_estudiante.habilitado =1 AND usuario.rol = 0 GROUP BY usuario.id_usuario
having cantidad = (SELECT  count(curso_estudiante.id_curso) as cantidad from usuario, curso_estudiante
where usuario.id_usuario = curso_estudiante.id_estudiante AND
      curso_estudiante.habilitado =1 AND usuario.rol = 0 GROUP BY id_usuario ORDER BY  cantidad DESC  LIMIT 1)
;

CREATE VIEW rp_top_clientes AS (SELECT info_usuario.*,count(curso_estudiante.id_curso) as cantidad from curso_estudiante,usuario
  LEFT JOIN info_usuario on info_usuario.id_usuario = usuario.id_usuario
where usuario.id_usuario = curso_estudiante.id_estudiante AND
  curso_estudiante.habilitado =1 AND usuario.rol = 0 GROUP BY usuario.id_usuario
having cantidad = (SELECT  count(curso_estudiante.id_curso) as cantidad from usuario, curso_estudiante
where usuario.id_usuario = curso_estudiante.id_estudiante AND
  curso_estudiante.habilitado =1 AND usuario.rol = 0 GROUP BY id_usuario ORDER BY  cantidad DESC  LIMIT 1)
);

Drop PROCEDURE top_clientes;

CREATE PROCEDURE top_clientes() BEGIN
  SELECT * from rp_top_clientes;
END;

INSERT INTO info_usuario (id_usuario, nombres, apellidos, numero_cursos, tag_line) VALUES ("1675052580099","Jackie","Chan",9,"Un actor");

INSERT into curso_estudiante VALUEs ("1652041310299",(SELECT id_curso from curso ORDER BY rand() LIMIT 1),1);

call top_clientes();

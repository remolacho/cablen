SELECT p.id, cl.codigo_abonado, cl.cedula, cl.primer_nombre, cl.primer_apellido, cl.sector, b.banco, p.octeto_cuenta_bancaria, p.num_deposito, p.monto, p.fecha_deposito, (
SELECT banco
FROM bancos
WHERE id_banco = p.banco_origen
) AS BancoOrigen
FROM clientes cl
INNER JOIN pagos p ON ( cl.codigo_abonado = p.codigo_abonado ) 
INNER JOIN bancos b ON ( p.id_banco = b.id_banco ) 
WHERE p.estatus =0
AND p.fecha_modificado
BETWEEN  '2013-08-10'
AND  '2013-09-09'
AND cl.boxy <>  'Interior'

-- join de pagos procesados por los usuarios del System
select u.cedula,u.nombre,u.apellido,h.id_pago,h.fecha_registro,
p.fecha_registro,p.monto,p.num_deposito,p.octeto_cuenta_bancaria,
b.banco FROM usuarios u INNER JOIN historial_pagos_procesados h 
ON (u.cedula = h.cedula) INNER JOIN pagos p ON (p.id = h.id_pago)
INNER JOIN bancos b ON (p.id_banco  = b.id_banco)


---query para el historial del abonado
SELECT c.CTACOMENT,c.CTAIMPGRAB,c.CTATIPCOMP,
c.IDCTACTE,c.CTAFECHA,c.CTAFEMIS
FROM CTACTE c 
WHERE c.abonumero ='00660001191';
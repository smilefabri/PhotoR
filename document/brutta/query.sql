SELECT COUNT(*)
FROM elaborazioni EL,tabelfiles TF, filtri F , utenti U
WHERE EL.FileID = TF.ID AND F.ID = EL.FiltroID AND U.ID = TF.UtenteID AND UtenteID = 1 AND DAY(NOW()) = DAY(EL.data) 
AND YEAR(NOW()) = YEAR(EL.data) AND MONTH(NOW()) = MONTH(EL.data)


SELECT UT.name, UT.lastname,startConn,endConn 
FROM connessioni CON,utenti UT
WHERE UT.ID = CON.UserID AND UT.ID=1


SELECT sum(dimFi)
FROM elaborazioni EL,tabelfiles TF, filtri F , utenti U
WHERE EL.FileID = TF.ID AND F.ID = EL.FiltroID AND U.ID = TF.UtenteID AND UtenteID = 1 AND DAY(NOW()) =DAY(EL.data) 
AND YEAR(NOW()) = YEAR(EL.data) AND MONTH(NOW()) = MONTH(EL.data)


SELECT COUNT(*)AS n, type
FROM elaborazioni, filtri
WHERE elaborazioni.FiltroID = filtri.ID
GROUP BY filtri.Type 
ORDER BY N DESC
LIMIT 1



SELECT utenti.email
FROM utenti
WHERE email NOT IN (
    SELECT email
    FROM elaborazioni EL,tabelfiles TF, filtri F , utenti U
    WHERE EL.FileID = TF.ID AND F.ID = EL.FiltroID AND U.ID = TF.UtenteID  
)


SELECT COUNT(*)AS N_elab
FROM elaborazioni
WHERE
YEAR(data) = YEAR(CURDATE() - INTERVAL 1 MONTH)
AND MONTH(Data) = MONTH(CURDATE() - INTERVAL 1 MONTH)



SELECT COUNT(*)AS N_conn
FROM connessioni
WHERE
YEAR(startConn) = YEAR(CURDATE() - INTERVAL 1 MONTH)
AND MONTH(startConn) = MONTH(CURDATE() - INTERVAL 1 MONTH)

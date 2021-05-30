SELECT COUNT(*)
FROM elaborazioni EL,tabelfiles TF, filtri F , utenti U
WHERE EL.FileID = TF.ID AND F.ID = EL.FiltroID AND U.ID = TF.UtenteID AND UtenteID = 1 AND DAY(NOW()) == DAY(TF.data) 
AND YEAR(NOW()) == YEAR(TF.data) AND MONTH(NOW()) == MONTH(TF.data)
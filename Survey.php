<?php

class Survey {

    public function listAllSurveys($dbcon){
        $sql = "SELECT * FROM surveys";
        $pdostm = $dbcon->prepare($sql);
        $pdostm->execute();
        $surveys = $pdostm->fetchAll(\PDO::FETCH_ASSOC);
        return $surveys;
    }
    public function addSurvey($name, $description, $userid, $categoryid)
    {
        $sql = "INSERT INTO surveys (survey_title, user_id, category_id) 
              VALUES (:name, :description, :userid, :categoryid) ";
        $pst = $db->prepare($sql);

        $pst->bindParam(':name', $name);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':userid', $userid);
        $pst->bindParam(':category_id', $category_id);

        $count = $pst->execute();
        return $count;
    }

    public function deleteSurvey($dbcon,$survey_id){
        $sql = "DELETE FROM surveys WHERE survey_id = :survey_id";

        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':survey_id', $survey_id);
        $count = $pst->execute();
        return $count;
    }
    public function displaySurveys($dbcon, $user_id){

        $sql = "SELECT * FROM `surveys` JOIN categories on surveys.category_id = categories.category_id JOIN users on surveys.user_id = users.user_id WHERE users.user_id= :user_id";
        $pst = $dbcon->prepare($sql);
        $pst->bindParam(':user_id', $user_id);
        $pst->execute();
        $indsurveys= $pst->fetchAll(PDO::FETCH_OBJ);
        return $indsurveys;

    }
}
?>
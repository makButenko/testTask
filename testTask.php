<?
class AnswerHandler
{
    public int $code;
    public string $text;

    public function __construct(int $code = null, string $text = null)
    {
        $this->code = $code;
        $this->text = $text;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function makeJSON()
    {
        return json_encode(array(
            "code" => $this->code,
            "text" => $this->text
        ));
    }
}

$answer = array();
if (!isset($_POST))
{
    $answer = array(
        "code" => 0,
        "text" => "No data ¯\_(ツ)_/¯"
    );

    echo json_encode($answer);

}

?>
<?
class Pagination
{
    public int $pagesCount = 1;
    public int $page = 1;
    public int $requestPage = 1;

    public int $perPage = 5;
    public int $total = 1;

    public int $midSize = 2;
    public int $allLimit = 1;

    public function __construct(
        $page = 1,
        $total = 1
    ) {
        $this->page = $page;
        $this->total = $total;
        $this->pagesCount = $this->getPagesCount();
        $this->requestPage = $this->getCurrentPages();
    }

    private function getPagesCount(): int
    {
        return ceil($this->total / $this->perPage);
    }
    private function getCurrentPages(): int
    {
        $page = (int) $this->page;
        if ($this->page < 1) {
            $page = 1;
        }
        if ($this->page > $this->pagesCount) {
            $page = $this->pagesCount;
        }
        return $page;
    }

    function getStartId()
    {
        return ($this->requestPage - 1) * $this->perPage;
    }

}
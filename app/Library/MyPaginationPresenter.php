<?php
namespace App\Library;

use Illuminate\Pagination\SimpleBootstrapThreePresenter;

class MyPaginationPresenter extends SimpleBootstrapThreePresenter
{
    public function render()
    {
        if ($this->hasPages())
        {
            return sprintf(
                '<ul class="pager">%s %s</ul>',
                $this->getPreviousButton('<button type="" class="prev-next-btn btn-primary "><< Prev</button>'),
                $this->getNextButton('<button type="" class="prev-next-btn btn-primary "> Next >></button>')
            );
        }

        return '';
    }
}
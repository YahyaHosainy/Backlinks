<button data-toggle="modal" data-target="#orderLinks" wire:click.prevent="showLinksModal({{ $report }})">
    <span style="background-color: #323b7a;color:white;padding:1px 8px;"
          data-toggle="tooltip"
          data-placement="top"
          title=""
          data-original-title="Links"
          aria-describedby="tooltip802212">
        L
    </span>
</button>
<button data-toggle="modal" data-target="#orderKeywords" wire:click.prevent="showKeywordsModal({{ $report }})">
        <span style="background-color: #323b7a;color:white;padding:1px 8px;"
              data-toggle="tooltip"
              data-placement="top"
              title=""
              data-original-title="Keywords"
              aria-describedby="tooltip802212">
        K
    </span>
</button>

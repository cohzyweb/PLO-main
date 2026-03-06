@props(['paginator'])

@if($paginator->hasPages())
  @php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();
    $onEachSide = 2; // Show 2 pages on each side of current page (desktop)
    
    // Calculate page ranges for desktop
    $start = max(1, $currentPage - $onEachSide);
    $end = min($lastPage, $currentPage + $onEachSide);
    
    // Calculate page ranges for mobile (always show 3 pages: current-1, current, current+1)
    // Adjust if near boundaries
    if ($currentPage == 1) {
      $startMobile = 1;
      $endMobile = min(3, $lastPage);
    } elseif ($currentPage == $lastPage) {
      $startMobile = max(1, $lastPage - 2);
      $endMobile = $lastPage;
    } else {
      $startMobile = $currentPage - 1;
      $endMobile = $currentPage + 1;
    }
    
    // Build pagination array
    $pages = [];
    
    // Always add first page (show on both desktop and mobile, but hide if it's already in the range)
    $showFirstPage = ($start > 1);
    $showFirstPageOnMobile = ($startMobile > 1);
    $showEllipsisAfterFirst = ($showFirstPage && $start > 2);
    $showEllipsisAfterFirstMobile = ($showFirstPageOnMobile && $startMobile > 2);
    
    if ($showFirstPage || $showFirstPageOnMobile) {
      $pages[] = [
        'page' => 1, 
        'url' => $paginator->url(1), 
        'type' => 'page', 
        'mobile' => $showFirstPageOnMobile
      ];
      if ($showEllipsisAfterFirst || $showEllipsisAfterFirstMobile) {
        $pages[] = [
          'page' => null, 
          'type' => 'ellipsis', 
          'mobile' => $showEllipsisAfterFirstMobile
        ];
      }
    }
    
    // Add pages around current
    for ($i = $start; $i <= $end; $i++) {
      $pages[] = [
        'page' => $i, 
        'url' => $paginator->url($i), 
        'type' => 'page',
        'mobile' => ($i >= $startMobile && $i <= $endMobile) // Show on mobile if within mobile range
      ];
    }
    
    // Add ellipsis and last page (show on both desktop and mobile, but hide if it's already in the range)
    $showLastPage = ($end < $lastPage);
    $showLastPageOnMobile = ($endMobile < $lastPage);
    $showEllipsisBeforeLast = ($showLastPage && $end < $lastPage - 1);
    $showEllipsisBeforeLastMobile = ($showLastPageOnMobile && $endMobile < $lastPage - 1);
    
    if ($showLastPage || $showLastPageOnMobile) {
      if ($showEllipsisBeforeLast || $showEllipsisBeforeLastMobile) {
        $pages[] = [
          'page' => null, 
          'type' => 'ellipsis', 
          'mobile' => $showEllipsisBeforeLastMobile
        ];
      }
      $pages[] = [
        'page' => $lastPage, 
        'url' => $paginator->url($lastPage), 
        'type' => 'page', 
        'mobile' => $showLastPageOnMobile
      ];
    }
  @endphp
  
  <div class="groups-pagination">
    <button class="groups-pagination-btn groups-pagination-btn--prev" 
            {{ $paginator->onFirstPage() ? 'disabled' : '' }}
            onclick="window.location.href='{{ $paginator->previousPageUrl() }}'">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M15 18L9 12L15 6" stroke="{{ $paginator->onFirstPage() ? '#BEBEBE' : '#021A21' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
    
    @foreach($pages as $item)
      @if($item['type'] === 'ellipsis')
        <span class="groups-pagination-ellipsis {{ !($item['mobile'] ?? false) ? 'groups-pagination-mobile-hide' : '' }}">...</span>
      @else
        <button class="groups-pagination-page {{ $paginator->currentPage() == $item['page'] ? 'groups-pagination-page--active' : '' }} {{ !($item['mobile'] ?? true) ? 'groups-pagination-mobile-hide' : '' }}"
                onclick="window.location.href='{{ $item['url'] }}'">
          {{ $item['page'] }}
        </button>
      @endif
    @endforeach
    
    <button class="groups-pagination-btn groups-pagination-btn--next"
            {{ $paginator->hasMorePages() ? '' : 'disabled' }}
            onclick="window.location.href='{{ $paginator->nextPageUrl() }}'">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M9 6L15 12L9 18" stroke="{{ $paginator->hasMorePages() ? '#021A21' : '#BEBEBE' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </button>
  </div>
@endif

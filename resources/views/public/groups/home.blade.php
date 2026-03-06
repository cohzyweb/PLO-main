<x-public-groups-layout>
  <div class="groups-home">
  <x-public.groups.sidebar />
  <!-- Main Visual -->
  <x-public.groups.mv />
  @php
    $fallbackTodayCasts = collect([
      (object) [
        'id' => 77,
        'name' => 'Rin',
        'age' => 21,
        'height' => 160,
        'bust' => 85,
        'waist' => 58,
        'hip' => 86,
        'bra' => 'C',
        'gallery_1' => 'diary/20250324-163332-4-1.jpg',
        'appeal_point' => 'メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ',
        'start_datetime' => '10:00:00',
        'end_datetime' => '17:00:00',
        'shop_slug' => 'shizuku',
        'shop_name' => 'SHIZUKU',
      ],
      (object) [
        'id' => 79,
        'name' => 'Mio',
        'age' => 22,
        'height' => 162,
        'bust' => 86,
        'waist' => 59,
        'hip' => 87,
        'bra' => 'D',
        'gallery_1' => 'diary/20250324-164835-11-1.jpg',
        'appeal_point' => 'メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ',
        'start_datetime' => '12:00:00',
        'end_datetime' => '20:00:00',
        'shop_slug' => 'miyabi',
        'shop_name' => 'MIYABI',
      ],
      (object) [
        'id' => 81,
        'name' => 'Yuna',
        'age' => 23,
        'height' => 158,
        'bust' => 84,
        'waist' => 57,
        'hip' => 85,
        'bra' => 'C',
        'gallery_1' => 'diary/20250324-174855-27-1.jpg',
        'appeal_point' => 'メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ',
        'start_datetime' => '14:00:00',
        'end_datetime' => '22:00:00',
        'shop_slug' => 'pussycat',
        'shop_name' => 'PUSSYCAT',
      ],
    ]);

    $fallbackEvents = collect([
      (object) [
        'id' => 1,
        'title' => 'MONTHLY EVENT',
        'published_at' => \Carbon\Carbon::parse('2026-02-24 12:00:00'),
        'thumbnail' => 'banner/23/lo03pNJ19jLj8pwYb6oj0kSTMqDoOkNLL0CYafhZ.png',
      ],
      (object) [
        'id' => 2,
        'title' => 'SPECIAL CAMPAIGN',
        'published_at' => \Carbon\Carbon::parse('2026-02-20 12:00:00'),
        'thumbnail' => 'banner/24/mlSZEQ9AkYgeFxLn4Btw6g6LZim7iVEvU8DAnk43.png',
      ],
      (object) [
        'id' => 3,
        'title' => 'WEEKEND INFO',
        'published_at' => \Carbon\Carbon::parse('2026-02-18 12:00:00'),
        'thumbnail' => 'banner/25/vesRlr3FPBRiJbwiWUqwbjuPBnya7fjmgERNlRJC.png',
      ],
    ]);

    $fallbackNewfaces = collect([
      (object) [
        'id' => 84,
        'name' => 'Airi',
        'age' => 20,
        'height' => 159,
        'bust' => 83,
        'waist' => 57,
        'hip' => 84,
        'bra' => 'C',
        'gallery_1' => 'diary/20250325-084303-14-1.jpg',
        'joined_at' => '2026-02-25',
        'appeal_point' => 'メッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージメッセージ',
        'shop_slug' => 'lovestory',
        'shop_name' => 'LOVESTORY',
      ],
      (object) [
        'id' => 86,
        'name' => 'Nana',
        'age' => 21,
        'height' => 161,
        'bust' => 87,
        'waist' => 59,
        'hip' => 88,
        'bra' => 'D',
        'gallery_1' => 'diary/20250325-091250-28-1.jpg',
        'joined_at' => '2026-02-23',
        'appeal_point' => '女の子メッセージ女の子メッセージ女の子メッセージ',
        'shop_slug' => 'siroganeze',
        'shop_name' => 'SIROGANEZE',
      ],
      (object) [
        'id' => 88,
        'name' => 'Sora',
        'age' => 22,
        'height' => 163,
        'bust' => 88,
        'waist' => 60,
        'hip' => 89,
        'bra' => 'D',
        'gallery_1' => 'diary/20250325-153341-40-1.jpg',
        'joined_at' => '2026-02-22',
        'appeal_point' => '女の子メッセージ女の子メッセージ女の子メッセージ',
        'shop_slug' => 'en',
        'shop_name' => 'EN',
      ],
    ]);

    $fallbackPickups = collect([
      (object) [
        'id' => 91,
        'name' => 'Riko',
        'age' => 22,
        'height' => 160,
        'bust' => 86,
        'waist' => 58,
        'hip' => 87,
        'bra' => 'D',
        'gallery_1' => 'diary/20250325-204853-9-1.jpg',
        'appeal_point' => '女の子メッセージ女の子メッセージ女の子メッセージ',
        'manager_comment' => 'æ˜ă‚‹ăä¸å¯§ăªæ¥å®¢ă§ă™ă€‚',
        'schedule_status' => 'æœ¬æ—¥å‡ºå‹¤ä¸­',
        'shop_slug' => 'shizuku',
        'shop_name' => 'SHIZUKU',
      ],
      (object) [
        'id' => 94,
        'name' => 'Noa',
        'age' => 21,
        'height' => 158,
        'bust' => 84,
        'waist' => 57,
        'hip' => 85,
        'bra' => 'C',
        'gallery_1' => 'diary/20250326-020339-42-1.jpg',
        'appeal_point' => '女の子メッセージ女の子メッセージ女の子メッセージ',
        'manager_comment' => 'å„ªă—ă„é›°å›²æ°—ă§äººæ°—ă§ă™ă€‚',
        'schedule_status' => 'æœ¬æ—¥å‡ºå‹¤ä¸­',
        'shop_slug' => 'miyabi',
        'shop_name' => 'MIYABI',
      ],
      (object) [
        'id' => 97,
        'name' => 'Mina',
        'age' => 23,
        'height' => 162,
        'bust' => 88,
        'waist' => 59,
        'hip' => 88,
        'bra' => 'E',
        'gallery_1' => 'diary/20250326-033330-28-2.jpg',
        'appeal_point' => '女の子メッセージ女の子メッセージ女の子メッセージ',
        'manager_comment' => 'ä¸å¯§ă§å®‰å¿ƒæ„ŸăŒă‚ă‚ă¾ă™ă€‚',
        'schedule_status' => 'æœ¬æ—¥ăä¼‘ă¿',
        'shop_slug' => 'pussycat',
        'shop_name' => 'PUSSYCAT',
      ],
      (object) [
        'id' => 99,
        'name' => 'Sara',
        'age' => 20,
        'height' => 157,
        'bust' => 82,
        'waist' => 56,
        'hip' => 84,
        'bra' => 'C',
        'gallery_1' => 'diary/20250326-081840-26-1.jpg',
        'appeal_point' => '女の子メッセージ女の子メッセージ女の子メッセージ',
        'manager_comment' => 'è¦ªă—ă¿ă‚„ă™ă„æ¥å®¢ă§ă™ă€‚',
        'schedule_status' => 'æœ¬æ—¥å‡ºå‹¤ä¸­',
        'shop_slug' => 'en',
        'shop_name' => 'EN',
      ],
      (object) [
        'id' => 103,
        'name' => 'Yui',
        'age' => 24,
        'height' => 164,
        'bust' => 89,
        'waist' => 61,
        'hip' => 90,
        'bra' => 'E',
        'gallery_1' => 'diary/20250326-111941-33-2.png',
        'appeal_point' => '女の子メッセージ女の子メッセージ女の子メッセージ',
        'manager_comment' => 'è½ă¡ç€ă„ăŸé­…å›ăŒă‚ă‚ă¾ă™ă€‚',
        'schedule_status' => 'æœ¬æ—¥å‡ºå‹¤ä¸­',
        'shop_slug' => 'siroganeze',
        'shop_name' => 'SIROGANEZE',
      ],
      (object) [
        'id' => 106,
        'name' => 'Moka',
        'age' => 22,
        'height' => 161,
        'bust' => 85,
        'waist' => 58,
        'hip' => 86,
        'bra' => 'D',
        'gallery_1' => 'diary/20250327-050433-12-1.jpg',
        'appeal_point' => 'ăœă²ä¼ă„ă«æ¥ă¦ăă ă•ă„ă€‚',
        'manager_comment' => 'ä¸å¯§ăªæ¥å®¢ă§å¥½è©•ă§ă™ă€‚',
        'schedule_status' => 'æœ¬æ—¥å‡ºå‹¤ä¸­',
        'shop_slug' => 'lovestory',
        'shop_name' => 'LOVESTORY',
      ],
    ]);

    $fallbackDiaries = collect([
      (object) [
        'id' => 1,
        'subject' => 'æœ¬æ—¥ă®ă”æŒ¨æ‹¶',
        'updated_at' => '02/28 18:30',
        'name' => 'Rin',
        'photo' => '20250328-081906-1-4.jpg',
        'cast_id' => 77,
        'gallery_1' => 'diary/20250324-163332-4-1.jpg',
        'cast_age' => 21,
        'cast_height' => 160,
        'cast_bust' => 85,
        'cast_waist' => 58,
        'cast_hip' => 86,
        'cast_bra' => 'C',
        'shop_slug' => 'shizuku',
        'shop_name' => 'SHIZUKU',
      ],
      (object) [
        'id' => 2,
        'subject' => 'é€±æœ«ă®ăçŸ¥ă‚‰ă›',
        'updated_at' => '02/28 17:45',
        'name' => 'Mio',
        'photo' => '20250329-061814-34-2.png',
        'cast_id' => 79,
        'gallery_1' => 'diary/20250324-164835-11-1.jpg',
        'cast_age' => 22,
        'cast_height' => 162,
        'cast_bust' => 86,
        'cast_waist' => 59,
        'cast_hip' => 87,
        'cast_bra' => 'D',
        'shop_slug' => 'miyabi',
        'shop_name' => 'MIYABI',
      ],
      (object) [
        'id' => 3,
        'subject' => 'ä»æ—¥ă‚‚ă‚ă‚ăŒă¨ă†',
        'updated_at' => '02/28 16:20',
        'name' => 'Yuna',
        'photo' => '20250330-221914-4-5.jpg',
        'cast_id' => 81,
        'gallery_1' => 'diary/20250324-174855-27-1.jpg',
        'cast_age' => 23,
        'cast_height' => 158,
        'cast_bust' => 84,
        'cast_waist' => 57,
        'cast_hip' => 85,
        'cast_bra' => 'C',
        'shop_slug' => 'pussycat',
        'shop_name' => 'PUSSYCAT',
      ],
      (object) [
        'id' => 4,
        'subject' => 'æ¬¡å›å‡ºå‹¤äºˆå®',
        'updated_at' => '02/28 15:10',
        'name' => 'Airi',
        'photo' => '20250404-150443-40-5.jpg',
        'cast_id' => 84,
        'gallery_1' => 'diary/20250325-084303-14-1.jpg',
        'cast_age' => 20,
        'cast_height' => 159,
        'cast_bust' => 83,
        'cast_waist' => 57,
        'cast_hip' => 84,
        'cast_bra' => 'C',
        'shop_slug' => 'lovestory',
        'shop_name' => 'LOVESTORY',
      ],
      (object) [
        'id' => 5,
        'subject' => 'ă‚¤ăƒ™ăƒ³ăƒˆæƒ…å ±',
        'updated_at' => '02/28 14:00',
        'name' => 'Nana',
        'photo' => '20250407-150348-35-4.png',
        'cast_id' => 86,
        'gallery_1' => 'diary/20250325-091250-28-1.jpg',
        'cast_age' => 21,
        'cast_height' => 161,
        'cast_bust' => 87,
        'cast_waist' => 59,
        'cast_hip' => 88,
        'cast_bra' => 'D',
        'shop_slug' => 'siroganeze',
        'shop_name' => 'SIROGANEZE',
      ],
      (object) [
        'id' => 6,
        'subject' => 'ă”äºˆç´„ă‚ă‚ăŒă¨ă†ă”ă–ă„ă¾ă™',
        'updated_at' => '02/28 12:30',
        'name' => 'Sora',
        'photo' => '20250412-144837-35-5.png',
        'cast_id' => 88,
        'gallery_1' => 'diary/20250325-153341-40-1.jpg',
        'cast_age' => 22,
        'cast_height' => 163,
        'cast_bust' => 88,
        'cast_waist' => 60,
        'cast_hip' => 89,
        'cast_bra' => 'D',
        'shop_slug' => 'en',
        'shop_name' => 'EN',
      ],
    ]);

    $fallbackVideos = collect([
      (object) [
        'video_url' => asset('assets/video/ă‚¹ă‚¿ăƒƒăƒ•ă‚¤ăƒ³ă‚¿ăƒ“ăƒ¥ăƒ¼å‹•ç”»/siroganeze_movieshop_1771573725.mp4'),
        'thumb_url' => 'banner/26/epKaUqNYpcdyoR0liiUbvlfWK76h31wfpvp2Fd30.png',
        'updated_at' => '2026-02-28 18:30:00',
        'name' => 'SIROGANEZE',
        'shop_name' => 'SIROGANEZE',
      ],
      (object) [
        'video_url' => asset('assets/video/ă‚¹ă‚¿ăƒƒăƒ•ă‚¤ăƒ³ă‚¿ăƒ“ăƒ¥ăƒ¼å‹•ç”»/pussycat011_movieshop_1733993913.mp4'),
        'thumb_url' => 'banner/27/4CiyNpvyIP0jcmXdljHwEwSAwXBcLsteCKHmVxtI.png',
        'updated_at' => '2026-02-28 18:10:00',
        'name' => 'PUSSYCAT',
        'shop_name' => 'PUSSYCAT',
      ],
      (object) [
        'video_url' => asset('assets/video/å¥³ă®å­ă‚¤ăƒ³ă‚¿ăƒ“ăƒ¥ăƒ¼å‹•ç”»/miyabi0930_moviegirl_1732184968.mp4'),
        'thumb_url' => 'banner/28/O0UR938C4pcfVKUi9pRVwZe5mIDNwDSDX86PyYVN.png',
        'updated_at' => '2026-02-28 17:50:00',
        'name' => 'MIYABI',
        'shop_name' => 'MIYABI',
      ],
      (object) [
        'video_url' => asset('assets/video/å¥³ă®å­ă‚¤ăƒ³ă‚¿ăƒ“ăƒ¥ăƒ¼å‹•ç”»/lovesS_moviegirl_1733452275.mp4'),
        'thumb_url' => 'banner/29/JBUzPyIHcR0h2hLPw1abQAYDSngaygREQa5WGuIF.png',
        'updated_at' => '2026-02-28 17:30:00',
        'name' => 'LOVESTORY',
        'shop_name' => 'LOVESTORY',
      ],
      (object) [
        'video_url' => asset('assets/video/å¥³ă®å­ă‚¤ăƒ³ă‚¿ăƒ“ăƒ¥ăƒ¼å‹•ç”»/siroganeze_moviegirl_1771573756.mp4'),
        'thumb_url' => 'banner/30/pnUZ5h6MptFk23UDdL5jJ68t2yeqTgdS9f9Q6nbI.png',
        'updated_at' => '2026-02-28 17:15:00',
        'name' => 'SHIZUKU',
        'shop_name' => 'SHIZUKU',
      ],
      (object) [
        'video_url' => asset('assets/video/å¥³ă®å­ă‚¤ăƒ³ă‚¿ăƒ“ăƒ¥ăƒ¼å‹•ç”»/8988_moviegirl_1771321495.mp4'),
        'thumb_url' => 'banner/31/Zh3s9J51dstwBYCA10qAVIHL01bbAQu7GhYkrz0D.png',
        'updated_at' => '2026-02-28 17:00:00',
        'name' => 'EN',
        'shop_name' => 'EN',
      ],
    ]);

    $displayTodayCasts = $todayCasts->isNotEmpty() ? $todayCasts : $fallbackTodayCasts;
    $displayEvents = $events->isNotEmpty() ? $events : $fallbackEvents;
    $displayNewfaces = $newfaces_this_week->isNotEmpty() ? $newfaces_this_week : $fallbackNewfaces;
    $displayPickups = $pickups->isNotEmpty() ? $pickups : $fallbackPickups;
    $homePickupPhotoFiles = collect(
      glob(public_path('assets/img/home/pickupgirl/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE) ?: []
    )->map(function ($path) {
      return basename($path);
    })->sort()->values();

    $homePickupPhotos = $homePickupPhotoFiles->map(function ($file) {
      return asset('assets/img/home/pickupgirl/' . rawurlencode($file));
    });

    $displayPickupsForHome = $displayPickups->values()->map(function ($pickup, $idx) use ($homePickupPhotos) {
      $pickupForHome = clone $pickup;
      $pickupForHome->featured_photo_url = $homePickupPhotos->isNotEmpty()
        ? $homePickupPhotos[$idx % $homePickupPhotos->count()]
        : (
          !empty($pickup->gallery_1)
            ? asset('storage/' . ltrim($pickup->gallery_1, '/'))
            : asset('assets/img/groups/pickup-cast-1.png')
        );

      return $pickupForHome;
    });

    $displayDiaries = $diaries->isNotEmpty() ? $diaries : $fallbackDiaries;
    $homeDiaryPhotoFiles = collect(
      glob(public_path('assets/img/home/photodiary/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE) ?: []
    )->map(function ($path) {
      return basename($path);
    })->sort()->values();

    $homeDiaryPhotos = $homeDiaryPhotoFiles->map(function ($file) {
      return asset('assets/img/home/photodiary/' . rawurlencode($file));
    });

    $homeDiaryAvatarFiles = collect(
      glob(public_path('assets/img/home/photodiary/*.{svg,SVG}'), GLOB_BRACE) ?: []
    )->map(function ($path) {
      return basename($path);
    })->sort()->values();

    $homeDiaryAvatars = $homeDiaryAvatarFiles->map(function ($file) {
      return asset('assets/img/home/photodiary/' . rawurlencode($file));
    });

    $displayDiariesForHome = $displayDiaries->values()->map(function ($diary, $idx) use ($homeDiaryPhotos, $homeDiaryAvatars) {
      $diaryForHome = clone $diary;
      $diaryPhotoPath = ltrim((string) ($diary->photo ?? ''), '/');
      $diaryGalleryPath = ltrim((string) ($diary->gallery_1 ?? ''), '/');

      $diaryForHome->featured_photo_url = $homeDiaryPhotos->isNotEmpty()
        ? $homeDiaryPhotos[$idx % $homeDiaryPhotos->count()]
        : (
          $diaryPhotoPath !== ''
            ? asset('storage/' . (str_starts_with($diaryPhotoPath, 'diary/') ? $diaryPhotoPath : 'diary/' . $diaryPhotoPath))
            : asset('assets/img/groups/diary1.jpg')
        );

      $diaryForHome->featured_avatar_url = $homeDiaryAvatars->isNotEmpty()
        ? $homeDiaryAvatars[$idx % $homeDiaryAvatars->count()]
        : (
          $diaryGalleryPath !== ''
            ? asset('storage/' . $diaryGalleryPath)
            : asset('assets/img/groups/castphoto.png')
        );

      return $diaryForHome;
    });

    $displayVideos = $videos->isNotEmpty() ? $videos : $fallbackVideos;

    $displayTodayCastsForSchedule = collect();
    if ($displayTodayCasts->isNotEmpty()) {
      $scheduleCasts = $displayTodayCasts->values();
      $displayTodayCastsForSchedule = collect(range(0, 8))->map(function ($idx) use ($scheduleCasts) {
        return $scheduleCasts[$idx % $scheduleCasts->count()];
      });
    }

    $homeNewfacePhotoFiles = collect([
      '1f86f0ada856783e70c633989b51d42f865d68ea.jpg',
      '65bcd4107224e029ff86b18c9142f0c9af9c38c3.png',
      'a8bdbe7f235482ea065dd608e40df21c74a427ae.jpg',
      'dd64819fb34964197f46ad5911cd65602d6c70ef.jpg',
      'e3e61652ae66240cf27318023a26314d5daad12f.png',
    ])->filter(function ($file) {
      return file_exists(public_path('assets/img/home/newface/' . $file));
    })->values();

    $homeNewfaceFrameFiles = collect([
      '0e0618a222c6603fcea83f5f586cbd23fae85438.png',
      '3d00c9e641bf6ffbb9fd3a6d437cc5ceace7f900.png',
      '5bcb601eb9841f197be317ffc3000561251db1b5.png',
      '8db4140aac44ab7842127f509f02bb05a093f20a.png',
      'cbb07a9e1a51278ba52bfdd8e54377ebe451f7db.png',
    ])->filter(function ($file) {
      return file_exists(public_path('assets/img/home/newface/' . $file));
    })->values();

    $homeNewfacePhotos = $homeNewfacePhotoFiles->map(function ($file) {
      return asset('assets/img/home/newface/' . rawurlencode($file));
    });

    $homeNewfaceFrames = $homeNewfaceFrameFiles->map(function ($file) {
      return asset('assets/img/home/newface/' . rawurlencode($file));
    });

    $displayNewfacesForFeatured = collect();
    if ($displayNewfaces->isNotEmpty()) {
      $newfaceCasts = $displayNewfaces->values();
      $displayNewfacesForFeatured = collect(range(0, 4))->map(function ($idx) use ($newfaceCasts, $homeNewfacePhotos, $homeNewfaceFrames) {
        $cast = $newfaceCasts[$idx % $newfaceCasts->count()];
        $featuredCast = clone $cast;

        $featuredCast->featured_photo_url = $homeNewfacePhotos->isNotEmpty()
          ? $homeNewfacePhotos[$idx % $homeNewfacePhotos->count()]
          : (
            !empty($cast->gallery_1)
              ? asset('storage/' . ltrim($cast->gallery_1, '/'))
              : asset('assets/img/groups/pickup-cast-1.png')
          );

        $featuredCast->featured_frame_url = $homeNewfaceFrames->isNotEmpty()
          ? $homeNewfaceFrames[$idx % $homeNewfaceFrames->count()]
          : asset('assets/img/groups/card-frame-' . $cast->shop_slug . '.png');

        return $featuredCast;
      });
    }

    $homeSchedulePhotoFiles = collect([
      '086763f8b41600391941483fae65b52f1b22b381.png',
      '102ed49f3a8e4bf5c6f26a929716ded50dc68d6f.jpg',
      '4cb04b634335737e45c5f3e5cf14dc6f42d06e3c.jpg',
      '70637651203664410113f396bed6eeb1abb0fb51.png',
      '73ff537a02d9d342e82f7b5698ef617ee4c3f076.jpg',
      '872262fe0294c4bbaffb61771f74d84c3ef2a151.png',
      '9849a652e2627f5c9155f3f5ba3d74b8038e9302.png',
      'ad9b9edb78703d01d5770bb4b937e489d0fdd131.jpg',
      'dd64819fb34964197f46ad5911cd65602d6c70ef.jpg',
    ])->filter(function ($file) {
      return file_exists(public_path('assets/img/home/' . $file));
    })->values();

    $homeScheduleFrameFiles = collect([
      '0e0618a222c6603fcea83f5f586cbd23fae85438 (1).png',
      '0e0618a222c6603fcea83f5f586cbd23fae85438.png',
      '3d00c9e641bf6ffbb9fd3a6d437cc5ceace7f900 (1).png',
      '3d00c9e641bf6ffbb9fd3a6d437cc5ceace7f900.png',
      '5bcb601eb9841f197be317ffc3000561251db1b5.png',
      '8db4140aac44ab7842127f509f02bb05a093f20a.png',
      'cbb07a9e1a51278ba52bfdd8e54377ebe451f7db (1).png',
      'cbb07a9e1a51278ba52bfdd8e54377ebe451f7db.png',
      'd06ab750824f7381378007815379211a1c0c2597.png',
    ])->filter(function ($file) {
      return file_exists(public_path('assets/img/home/' . $file));
    })->values();

    $homeSchedulePhotos = $homeSchedulePhotoFiles->map(function ($file) {
      return asset('assets/img/home/' . rawurlencode($file));
    });

    $homeScheduleFrames = $homeScheduleFrameFiles->map(function ($file) {
      return asset('assets/img/home/' . rawurlencode($file));
    });

    $homeEventBannerFiles = collect(
      glob(public_path('assets/img/home/event/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE) ?: []
    )->map(function ($path) {
      return basename($path);
    })->sort()->values();

    $homeEventBanners = $homeEventBannerFiles->map(function ($file) {
      return asset('assets/img/home/event/' . rawurlencode($file));
    });

    $baseEventsForHome = $homeEventBanners->isNotEmpty()
      ? $homeEventBanners->values()->map(function ($bannerUrl, $idx) {
          return (object) [
            'title' => 'EVENT INFO',
            'published_at' => now()->copy()->subDays($idx),
            'thumbnail_url' => $bannerUrl,
            'detail_url' => route('public.groups.event'),
          ];
        })
      : $displayEvents->values()->map(function ($event) {
          return (object) [
            'title' => $event->title ?? '',
            'published_at' => $event->published_at instanceof \Carbon\CarbonInterface
              ? $event->published_at
              : \Carbon\Carbon::parse($event->published_at),
            'thumbnail_url' => !empty($event->thumbnail)
              ? asset('storage/' . ltrim($event->thumbnail, '/'))
              : asset('assets/img/groups/bg-event.jpg'),
            'detail_url' => !empty($event->id)
              ? route('public.groups.event.detail', ['id' => $event->id])
              : route('public.groups.event'),
          ];
        });

    $displayEventsForHome = $baseEventsForHome->isNotEmpty()
      ? collect(range(0, 5))->map(function ($idx) use ($baseEventsForHome) {
          return $baseEventsForHome[$idx % $baseEventsForHome->count()];
        })
      : collect();
  @endphp
  {{-- <div class="mv-banner-bottom">
    <div class="mv-banner-bottom-wrapper">
      <div class="mv-banner-bottom-slide">
        <img src="{{ asset('assets/img/groups/banner-bottom.png') }}" alt="">
        <img src="{{ asset('assets/img/groups/banner-bottom.png') }}" alt="">
      </div>
    </div>
  </div> --}}
  @if($displayTodayCastsForSchedule->count() > 0)
  <div class="section-title">
    <h1 class="section-title-en">Today Schedule</h1>
    <div class="section-title-jp">
      <svg xmlns="http://www.w3.org/2000/svg" width="21" height="23" viewBox="0 0 21 23" fill="none">
        <path d="M2.01123 23C0.795273 22.7404 0.127176 22.0539 0.0186893 20.8024C0.114519 15.1935 -0.158505 9.53781 0.158818 3.95402C0.251936 3.42664 1.30245 2.51562 1.78521 2.51562H4.09055V4.62695C4.09055 4.89648 4.76046 5.4068 5.0606 5.4598C5.60304 5.55504 7.2674 5.54156 7.84238 5.48047C8.32876 5.42836 8.66055 5.23699 8.8721 4.79676C8.90736 4.72309 9.06286 4.30082 9.06286 4.26758V2.51562H11.9558V4.26758C11.9558 4.82371 12.5245 5.41578 13.0841 5.48227C13.6437 5.54875 15.4428 5.55234 15.9581 5.4598C16.2781 5.4023 16.9281 4.945 16.9281 4.62695V2.51562H19.2335C19.2895 2.51562 19.9341 2.82559 20.0318 2.89027C20.642 3.29277 20.896 3.92797 20.9955 4.62785L21 20.8024C20.9376 21.992 20.1014 22.8661 18.9171 23H2.01123ZM19.4595 7.99609H1.5592V20.9785C1.5592 21.1843 2.07722 21.558 2.32313 21.4771H18.6043C18.8682 21.5293 19.4595 21.2418 19.4595 20.9785V7.99609Z" fill="#021A21"/>
        <path d="M15.3008 0C15.6109 0.1725 15.9572 0.380039 16.0187 0.769063C16.072 1.10598 16.0593 4.23973 15.9789 4.40324C15.9057 4.55148 15.7664 4.56766 15.6209 4.58652C14.8515 4.68535 13.7251 4.57125 12.9494 4.49219V0.583984C12.9494 0.364766 13.4322 0.134766 13.5822 0H15.3008Z" fill="#021A21"/>
        <path d="M7.34515 0C7.67694 0.1725 7.96172 0.269531 8.06388 0.67832L8.05031 4.33945C8.00059 4.4868 7.89753 4.55238 7.74926 4.57934C7.49613 4.62605 5.32097 4.60809 5.17452 4.53711C5.07145 4.4877 5.01088 4.37629 4.99642 4.26488C5.08592 3.18586 4.86714 1.90379 4.9919 0.851719C5.04614 0.394414 5.34719 0.203047 5.71695 0H7.34515Z" fill="#021A21"/>
        <path d="M16.6569 9.97266H4.36177V11.5898H16.6569V9.97266Z" fill="#021A21"/>
        <path d="M16.6569 13.5664H4.36177V15.0938H16.6569V13.5664Z" fill="#021A21"/>
        <path d="M13.2215 17.1602H4.36177V18.6875H13.2215V17.1602Z" fill="#021A21"/>
      </svg>
      <h2 class="section-title-jp-text">出勤情報</h2>
    </div>
  </div>

  <div class="schedule"> {{-- grid --}}
    <div class="schedule-grid">
      {{-- @for ($i=1 ; $i <= 10 ; $i++)
      <div class="schedule-grid-content">
        <div class="schedule-grid-content-img">
          <img class="schedule-grid-content-img-photo" src="{{ asset('assets/img/groups/pickup-cast-1.png') }}">
          <img class="schedule-grid-content-img-frame" src="{{ asset('assets/img/groups/card-frame.png') }}">
        </div>
        <div class="schedule-grid-content-contents">
          <div class="schedule-grid-content-contents-top pc-only">
            <div class="schedule-grid-content-contents-top-times">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">00:00 - 00:00</span>
            </div>
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">ăƒ—ăƒƒă‚·ăƒ¼ă‚­ăƒ£ăƒƒăƒˆ</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-top sp-only">
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">ăƒ—ăƒƒă‚·ăƒ¼ă‚­ăƒ£ăƒƒăƒˆ</span>
            </div>
            <div class="schedule-grid-content-contents-top-times">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">00:00 - 00:00</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-measure pc-only">
            <span class="schedule-grid-content-contents-measure-text">キャスト名(00)／T.160 B.85(C) W.60 H.83</span>
          </div>
          <div class="schedule-grid-content-contents-measure sp-only">
            <span class="schedule-grid-content-contents-measure-name">ă‚­ăƒ£ă‚¹ăƒˆå(00)</span>
            <span class="schedule-grid-content-contents-measure-text">T.160 B.85(C) W.60 H.83</span>
          </div>
          <div class="schedule-grid-content-contents-message">
            <span class="schedule-grid-content-contents-message-text">{{ \Illuminate\Support\Str::limit($todayCast->appeal_point, 60, '...') }}</span>
          </div>
        </div>
      </div>

      @endfor --}}
      @foreach($displayTodayCastsForSchedule->chunk(3) as $row)
      <div class="schedule-grid-row">
      @foreach($row as $todayCast)
      @php
        $scheduleImageUrl = $homeSchedulePhotos->isNotEmpty()
          ? $homeSchedulePhotos[(($loop->parent->index * 3) + $loop->index) % $homeSchedulePhotos->count()]
          : (
            !empty($todayCast->gallery_1)
              ? asset('storage/' . ltrim($todayCast->gallery_1, '/'))
              : asset('assets/img/groups/pickup-cast-1.png')
          );

        $scheduleFrameUrl = $homeScheduleFrames->isNotEmpty()
          ? $homeScheduleFrames[(($loop->parent->index * 3) + $loop->index) % $homeScheduleFrames->count()]
          : asset('assets/img/groups/card-frame-'.$todayCast->shop_slug.'.png');
      @endphp
      <a class="schedule-grid-content" href="{{ route('public.shops.shop.profile',[ 'shop'=>$todayCast->shop_slug,'id'=>$todayCast->id ]) }}">{{-- flex col--}}
        <div class="schedule-grid-content-img" aria-label="{{ $todayCast->name }}">
          <img class="schedule-grid-content-img-photo" src="{{ $scheduleImageUrl }}" alt="{{ $todayCast->name }}">
          <img class="schedule-grid-content-img-frame" src="{{ $scheduleFrameUrl }}" alt="">
        </div>
        <div class="schedule-grid-content-contents">{{-- flex col--}}
          <div class="schedule-grid-content-contents-top pc-only">{{-- flex row--}}
            <div class="schedule-grid-content-contents-top-times">{{-- flex row--}}
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">{{ date('H:i', strtotime($todayCast->start_datetime)) }} - {{ date('H:i', strtotime($todayCast->end_datetime)) }}</span>
            </div>
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">{{ $todayCast->shop_name }}</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-top sp-only">{{-- flex row--}}
            <div class="schedule-grid-content-contents-top-shop">
              <span class="schedule-grid-content-contents-top-shop-name">{{ $todayCast->shop_name }}</span>
            </div>
            <div class="schedule-grid-content-contents-top-times">{{-- flex row--}}
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                <path d="M10 0C4.486 0 0 4.486 0 10C0 15.514 4.486 20 10 20C15.514 20 20 15.514 20 10C20 4.486 15.514 0 10 0ZM15.75 11H9V4H11V9H15.75V11Z" fill="#021A21"/>
              </svg>
              <span class="schedule-grid-content-contents-top-times-text">{{ date('H:i', strtotime($todayCast->start_datetime)) }} - {{ date('H:i', strtotime($todayCast->end_datetime)) }}</span>
            </div>
          </div>
          <div class="schedule-grid-content-contents-measure pc-only">
            <span class="schedule-grid-content-contents-measure-text">キャスト名(00)／T.160 B.85(C) W.60 H.83</span>
          </div>
          <div class="schedule-grid-content-contents-measure sp-only">
            <span class="schedule-grid-content-contents-measure-name">{{ $todayCast->name }} ({{ $todayCast->age }})</span>
            <span class="schedule-grid-content-contents-measure-text">キャスト名(00)／T.160 B.85(C) W.60 H.83</span>
          </div>
          <div class="schedule-grid-content-contents-message">
            <span class="schedule-grid-content-contents-message-text">{{ \Illuminate\Support\Str::limit($todayCast->appeal_point, 60, '...') }}</span>
          </div>
        </div>
      </a>

      @endforeach
      </div>
      @endforeach
    </div>
    <div class="groups-button-more">
      <a href="{{ route('public.groups.schedule') }}" class="groups-button-more-btn">もっと見る</a>
    </div>
  </div>
  @endif
  @if($displayEventsForHome->count() > 0)
  <div class="event">
    <div class="section-title">
      <h1 class="section-title-en">Event Info</h1>
      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="25" viewBox="0 0 22 25" fill="none">
          <path d="M10.9016 0.00805664C12.3237 0.177979 12.8743 1.80591 12.0609 2.93481C15.4556 3.38208 18.2079 6.27954 18.5209 9.73071C18.7305 12.0393 18.0157 14.5999 19.2097 16.6956H2.78674C3.95857 14.6233 3.28619 12.0999 3.46491 9.81665C3.72092 6.53833 6.32058 3.5686 9.54914 3.03149C8.59081 1.91919 9.11441 0.187744 10.6118 0.00805664C10.6978 -0.00268555 10.8156 -0.00268555 10.9016 0.00805664Z" fill="#D99F01"/>
          <path d="M10.6118 24.9915C10.4524 24.9778 9.91723 24.8186 9.74237 24.7473C9.0188 24.4504 8.56571 23.677 8.38989 22.9426H13.1236C12.8763 23.9993 12.1015 24.8586 10.9982 24.9924C10.8862 25.0061 10.7277 25.0012 10.6118 24.9915Z" fill="#D99F01"/>
          <path d="M1.40913 17.9875L20.4182 17.9641C22.4276 18.1926 22.5551 20.9377 20.6134 21.3821H1.38401C-0.464057 20.9348 -0.466955 18.4104 1.40913 17.9875Z" fill="#D99F01"/>
        </svg>
        <h2 class="section-title-jp-text">イベント情報</h2>
      </div>
    </div>

    <div class="event-slider swiper content-wrapper">
      <div class="swiper-wrapper">
        @foreach($displayEventsForHome as $event)
          <div class="swiper-slide">
            <div class="event-main">
              <div class="event-main-content pc-only">
                <h3 class="event-main-title">2025/10/10　|　毎月「2」のつく日はラブストデー！</h3>
              </div>
              <div class="event-main-content sp-only">
                <h3 class="event-main-content-date">{{ $event->published_at->format('y/m/d') }}</h3>
                <h3 class="event-main-content-title">{{ $event->title }}</h3>
              </div>
              <div class="event-main-image">
                <a href="{{ $event->detail_url }}">
                  <img src="{{ $event->thumbnail_url }}" alt="{{ $event->title }}">
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="event-pagination">
        <div class="swiper-wrapper">
          @foreach($displayEventsForHome as $event)
            <div class="swiper-slide" data-swiper-slide-index="{{ $loop->index }}">
              <div class="event-slide-image">
                <img src="{{ $event->thumbnail_url }}" alt="{{ $event->title }}">
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endif
  @if($displayNewfaces->count() > 0)
<section class="newface" aria-labelledby="newface-title">
    {{-- Header --}}
    <header class="section-title newface__header">
      <h1 id="newface-title" class="section-title-en">New Face</h1>

      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="24" viewBox="0 0 21 24" fill="none" aria-hidden="true" focusable="false">
          <path d="M4.17548 0L5.21993 0.461095L10.4749 5.52484L15.6644 0.461095L16.7088 0H17.1629C18.3845 0.329222 18.874 0.992277 18.9776 2.26029C18.7732 6.26536 19.2546 10.5535 18.983 14.5254C18.8559 16.3855 18.2592 16.6262 17.1148 17.7918C15.5817 19.354 13.709 21.4483 12.0779 22.8205C11.6219 23.2042 11.2051 23.4522 10.6238 23.6035C10.5057 23.5933 10.3759 23.6191 10.2605 23.6035C9.74193 23.5315 9.29145 23.242 8.89729 22.9127C7.31699 21.5931 5.5269 19.5744 4.04197 18.0685C2.81952 16.8291 2.03754 16.522 1.90131 14.5254C1.62976 10.5535 2.11111 6.26536 1.90676 2.26029C2.00848 1.00888 2.52707 0.332911 3.72137 0H4.17548ZM10.4422 20.2836C11.4884 19.4831 12.363 18.4493 13.3003 17.5152C13.8316 16.9868 15.8796 15.2466 16.0304 14.6619L16.0259 5.07297C15.817 4.73914 15.4782 4.70225 15.1694 4.93741L10.4431 9.63505L10.4422 20.2836Z" fill="#52B845"/>
        </svg>
        <h2 class="section-title-jp-text">新人情報</h2>
      </div>
    </header>

    @php
      $newfaceSlidesForHome = $displayNewfacesForFeatured->isNotEmpty() ? $displayNewfacesForFeatured : $displayNewfaces;
    @endphp

    {{-- Slider (danh sách card kéo ngang) --}}
    <div class="newface-slide content-wrapper" aria-label="New Face slider">
      <div class="newface-track">
        @foreach ($newfaceSlidesForHome as $cast)
          <div class="newface-slide-item">
            <div class="newface-content">

              {{-- Top: date + underbar --}}
              <div class="newface-content-top">
                <div class="newface-content-top-newdate">
                  <span class="newface-content-top-newdate-date">{{ \Carbon\Carbon::parse($cast->joined_at)->format('m/d') }}</span>
                  <span class="newface-content-top-newdate-new">New</span>
                </div>
                <div class="newface-content-top-underbar" aria-hidden="true"></div>
              </div>

	              {{-- Image stack --}}
		              <div class="newface-content-img">
		                @php
		                  // Keep New Face visual stable without depending on DB image fields.
		                  $staticNewfacePool = $homeNewfacePhotos->isNotEmpty()
		                    ? $homeNewfacePhotos->values()
		                    : collect([asset('assets/img/groups/pickup-cast-1.png')]);

		                  $newfaceImageUrl = $staticNewfacePool[$loop->index % $staticNewfacePool->count()]
		                    ?? asset('assets/img/groups/pickup-cast-1.png');

		                  $newfaceFrameUrl = $homeNewfaceFrames->isNotEmpty()
		                    ? $homeNewfaceFrames[$loop->index % $homeNewfaceFrames->count()]
		                    : asset('assets/img/groups/card-frame-' . $cast->shop_slug . '.png');
		                @endphp

                <img class="newface-content-img-photo"
                     src="{{ $newfaceImageUrl }}"
                     alt="{{ $cast->name }}"
                     loading="lazy"
                     decoding="async">

		            <img class="newface-content-img-frame"
		                     src="{{ $newfaceFrameUrl }}"
		                     alt=""
	                     loading="lazy"
	                     decoding="async">
	              </div>

              {{-- Text --}}
              <div class="newface-content-contents">
                <div class="newface-content-contents-top">
                  <span class="newface-content-contents-top-name">{{ $cast->name }}</span>
                  <a class="newface-content-contents-top-shop" href="{{ route('public.shops.shop.profile', ['shop' => $cast->shop_slug, 'id' => $cast->id]) }}">
                    <span class="newface-content-contents-top-shop-text">{{ $cast->shop_name }}</span>
                  </a>
                </div>

                <div class="newface-content-contents-measure">
                  <span class="newface-content-contents-measure-text">
                    {{ $cast->age }}歳／T.{{ $cast->height }} B.{{ $cast->bust }}({{ $cast->bra }}) W.{{ $cast->waist }} H.{{ $cast->hip }}
                  </span>
                </div>

                <div class="newface-content-contents-message">
                  <span class="newface-content-contents-message-text">
                    {{ \Illuminate\Support\Str::limit($cast->appeal_point, 60, '...') }}
                  </span>
                </div>
              </div>

        </div>
          </div>
        @endforeach
      </div>
      {{-- More --}}
      
      
    </div>

    <div class="groups-button-more">
        <a href="{{ route('public.groups.newface') }}" class="groups-button-more-btn">もっと見る</a>
      </div>
  
</section>
@endif

  @if($displayPickups->count() > 0)
  <section class="pickup">
    <div class="section-title">
      <h1 class="section-title-en">Pickup Girl</h1>
      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none">
          <path d="M22.9831 12.0475C23.0074 12.2684 23.0038 12.6444 22.9831 12.8689C22.9589 13.14 22.8295 13.6739 22.7594 13.9641C22.3434 15.6891 21.3112 17.3265 20.2474 18.7101H17.0625C18.1172 16.1601 19.34 13.6337 19.8153 10.8774C19.95 10.0943 20.0021 9.31125 20.1037 8.52452C20.4388 8.0919 21.3309 8.84943 21.5969 9.12232C22.2842 9.82783 22.8753 11.06 22.984 12.0466L22.9831 12.0475Z" fill="#FF3498"/>
          <path d="M0.0139126 11.865C0.0938727 11.0928 0.527813 10.0578 1.00308 9.44815C1.2798 9.09403 2.47291 7.79801 2.89338 8.34198C2.9949 9.1278 3.04701 9.9118 3.18177 10.6949C3.65794 13.4549 4.88519 15.9721 5.93455 18.5276H2.75052C1.69038 17.154 0.656289 15.4965 0.237621 13.7825C0.161255 13.4704 0.0354749 12.8926 0.0139126 12.5951C-0.0013607 12.3834 -0.0076497 12.0721 0.0139126 11.865Z" fill="#FF3498"/>
          <path d="M12.9342 18.7101V8.25983C12.9342 7.84273 13.3825 7.20933 13.7122 6.95195C15.3312 5.69244 17.836 6.66993 18.1145 8.739C18.2691 9.88716 17.7704 11.6295 17.4434 12.7557C16.8478 14.8075 15.9781 16.8017 15.0419 18.7092H12.9333L12.9342 18.7101Z" fill="#FF3498"/>
          <path d="M10.0637 18.5276H7.95512C7.02525 16.6164 6.15197 14.6249 5.55362 12.5741C5.2257 11.4515 4.72886 9.7028 4.8825 8.55737C5.16101 6.48648 7.66672 5.50169 9.28479 6.77033C9.59116 7.01036 10.0628 7.69579 10.0628 8.07821V18.5285L10.0637 18.5276Z" fill="#FF3498"/>
          <path d="M20.1118 20.1704H2.88529V22.9998H20.1118V20.1704Z" fill="#FF3498"/>
          <path d="M12.3062 0V2.00792H14.3699V3.74202H12.3062V5.74994H10.6917V3.74202H8.62804V2.00792H10.6917V0H12.3062Z" fill="#ff349aff"/>
          <path d="M11.8363 9.24097C12.1121 9.52299 11.9693 10.1263 11.4509 10.1153C10.6181 10.098 11.2101 8.60118 11.8363 9.24097Z" fill="#FF3498"/>
          <path d="M11.8354 7.14088C12.0654 7.34532 11.9971 8.00793 11.5381 8.02527C10.5911 8.06269 11.1706 6.54945 11.8354 7.14088Z" fill="#FF3498"/>
          <path d="M11.3871 11.2407C12.158 11.1047 12.1005 12.1579 11.53 12.2109C11.0376 12.2565 10.7816 11.3484 11.3871 11.2407Z" fill="#FF3498"/>
          <path d="M11.3871 13.3399C12.158 13.2039 12.1005 14.2571 11.53 14.31C11.0376 14.3557 10.7816 13.4476 11.3871 13.3399Z" fill="#FF3498"/>
          <path d="M11.2928 15.4418C12.14 15.1826 12.2245 16.4795 11.3691 16.3371C10.9325 16.265 10.9352 15.5513 11.2928 15.4418Z" fill="#FF3498"/>
          <path d="M11.2928 17.541C12.14 17.2818 12.2245 18.5787 11.3691 18.4363C10.9325 18.3642 10.9352 17.6505 11.2928 17.541Z" fill="#FF3498"/>
        </svg>
        <h2 class="section-title-jp-text">ピックアップ</h2>
      </div>
    </div>
    <div class="pickup-contents">
      <div class="pickup-girl__inner">
          <div class="pickup-main-border-img">
            <img class="pickup-main-border-img-photo" src="{{ asset('assets/img/home/pickupgirl/0d50d8cad0a0b77a8542dc16dfab0bca65297c3f.jpg') }}">
            <img class="pickup-main-border-img-frame" src="{{ asset('assets/img/home/pickupgirl/0d50d8cad0a0b77a8542dc16dfab0bca65297c3f.jpg') }}">
          </div>
        <div class="pickup-girl__content">
          <h3 class="pickup-girl__name">キャスト名</h3>
          <p class="pickup-girl__meta">T.160 B.85(C) W.60 H.83</p>

          <h4 class="pickup-girl__title">プッシュキャット</h4>

          <div class="pickup-girl__status">本日出勤中</div>

          <div class="pickup-girl__message">
            店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ 店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ店長メッセージ
          </div>
        </div>
      </div>
    </div>
    <div class="pickup-contents-bottom">
      <div class="pickup-contents-slider-content-wrapper">
        <div class="pickup-contents-track">
          @foreach ($displayPickupsForHome as $pickup)
            <div class="pickup-contents-slide-item">
              <a class="pickup-card"
                href="{{ route('public.shops.shop.profile', ['shop' => $pickup->shop_slug, 'id' => $pickup->id]) }}">

                <!-- Image -->
                <div class="pickup-slide-contents-img">
                  <img class="pickup-slide-contents-img-photo" src="{{ $pickup->featured_photo_url }}" alt="{{ $pickup->name }}">
                  <img class="pickup-slide-contents-img-frame" src="{{ asset('assets/img/groups/card-frame-'.$pickup->shop_slug.'.png') }}" alt="">
                </div>

                <!-- Content -->
                <div class="pickup-card__body">
                  <h3 class="pickup-card__name">{{ $pickup->name }}</h3>

                  <p class="pickup-card__measure">
                    T.{{ $pickup->height }} B.{{ $pickup->bust }}({{ $pickup->bra }})
                    W.{{ $pickup->waist }} H.{{ $pickup->hip }}
                  </p>

                  <p class="pickup-card__shop">{{ $pickup->shop_name }}</p>

                  <div class="pickup-card__status">
                    <span class="pickup-card__statusText">{{ $pickup->schedule_status }}</span>
                  </div>

                  <p class="pickup-card__message">
                    女の子メッセージ女の子メッセージ女の子メッセージ
                  </p>
                </div>

              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  @endif
  @if($displayDiariesForHome->count() > 0)
<section class="diary" aria-labelledby="photo-diary-title">
  <div class="container">
    {{-- Title --}}
    <header class="section-title">
      <h1 id="photo-diary-title" class="section-title-en">Photo Diary</h1>

      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none" aria-hidden="true" focusable="false">
          <path d="M18.2649 1C18.7446 1.12039 19.207 1.16082 19.673 1.35578C20.7946 1.82387 21.6025 2.86336 21.8691 4.02055C22.1311 8.88738 21.9053 13.7955 21.9869 18.6777L21.8963 18.9463L16.9049 23.9075C13.6661 23.6891 10.032 24.1995 6.84043 23.9075C5.09412 23.7475 3.63342 22.585 3.23628 20.8869C3.29159 15.6984 2.77567 10.05 3.11841 4.88844C3.25895 2.77441 4.65437 1.19945 6.84043 1H18.2649ZM16.3608 22.4754V19.9247C16.3608 19.4243 17.4326 18.3587 17.9476 18.3587H20.4863L20.6223 18.2248V4.80309C20.6223 3.73395 19.5824 2.5534 18.4916 2.43121H6.61375C5.21652 2.69445 4.58092 3.73754 4.47937 5.06812C4.11578 9.8568 4.75773 15.0893 4.4839 19.9238C4.5646 20.7575 4.85747 21.5715 5.57648 22.0666C5.68529 22.142 6.35988 22.4754 6.43241 22.4754H16.3608Z" fill="#A30ABA"/>
          <path d="M16.633 15.9437H8.47267C8.41283 14.3346 9.67677 12.5871 11.3524 12.3877C11.8483 12.3284 12.2745 12.482 12.7831 12.4569C13.4505 12.4245 13.5167 12.2323 14.2738 12.5009C15.7145 13.0112 16.6693 14.4406 16.633 15.9437Z" fill="#A30ABA"/>
          <path d="M12.1684 6.7509C15.4398 6.29449 15.6656 11.3599 12.9536 11.73C9.6677 12.1784 9.4238 7.13363 12.1684 6.7509Z" fill="#A30ABA"/>
        </svg>
        <h2 class="section-title-jp-text">最新写メ日記</h2>
      </div>
    </header>

    {{-- Panel (khung trắng mờ giống Figma) --}}
    <div class="diary-panel">

      {{-- PC Grid --}}
      <div class="diary-contents pc-only">

  @foreach($displayDiariesForHome->take(6)->chunk(3) as $chunk)
    <div class="diary-row">
      
      @foreach($chunk as $diary)
        <a class="diary-contents-border-item"
           href="{{ route('public.shops.shop.photo-diary.detail', ['shop'=>$diary->shop_slug,'id'=>$diary->id]) }}">

          <div class="diary-contents-border-item-img">
            <img src="{{ $diary->featured_photo_url }}">
          </div>

          <div class="diary-contents-border-item-meta">
            <span class="diary-contents-border-item-title">
              {{ $diary->subject }}
            </span>

            <span class="diary-contents-border-item-datetime">
              {{ \Carbon\Carbon::parse($diary->updated_at)->format('m月d日(D) H:i') }}
            </span>
          </div>

          <div class="diary-contents-border-item-detail">
            <div class="diary-contents-border-item-detail-castphoto">
              <img class="diary-contents-border-item-detail-castphoto-img"
                   src="{{ $diary->featured_avatar_url }}">
            </div>

            <div class="diary-contents-border-item-detail-contents">
              <span class="diary-contents-border-item-detail-contents-name">
                {{ $diary->name }}({{ $diary->cast_age }})
              </span>

              <span class="diary-contents-border-item-detail-contents-measure">
                T.{{ $diary->cast_height }}
                B.{{ $diary->cast_bust }}({{ $diary->cast_bra }})
                W.{{ $diary->cast_waist }}
                H.{{ $diary->cast_hip }}
              </span>
            </div>
          </div>

          <div class="diary-contents-border-item-shop-wrapper">
            <span class="diary-contents-border-item-shop">
              {{ $diary->shop_name }}
            </span>
          </div>

        </a>
      @endforeach

    </div>
  @endforeach

</div>

      {{-- SP Swiper (giữ logic cũ) --}}
      <div class="diary-contents-slide content-wrapper sp-only">
        <div class="swiper-wrapper">
          @foreach($displayDiariesForHome as $diary)
            <div class="swiper-slide">
              <a class="diary-contents-slide-item"
                 href="{{ route('public.shops.shop.photo-diary.detail', ['shop' => $diary->shop_slug, 'id' => $diary->id]) }}">

                <div class="diary-contents-slide-item-img">
                  <img src="{{ $diary->featured_photo_url }}" alt="{{ $diary->subject ?? 'Photo Diary' }}" loading="lazy" decoding="async">
                </div>

                <span class="diary-contents-slide-item-title">{{ $diary->subject }}</span>
                <span class="diary-contents-slide-item-datetime">
                  {{ \Carbon\Carbon::parse($diary->updated_at)->format('m月d日(D) H:i') }}
                </span>

                <div class="diary-contents-slide-item-detail">
                  <div class="diary-contents-slide-item-detail-castphoto">
                    <img class="diary-contents-slide-item-detail-castphoto-img" src="{{ $diary->featured_avatar_url }}" alt="" loading="lazy" decoding="async">
                  </div>

                  <div class="diary-contents-slide-item-detail-contents">
                    <span class="diary-contents-slide-item-detail-contents-name">
                      {{ $diary->name }}({{ $diary->cast_age }})
                    </span>
                    <span class="diary-contents-slide-item-detail-contents-measure">
                      T.{{ $diary->cast_height }}
                      B.{{ $diary->cast_bust }}({{ $diary->cast_bra }})
                      W.{{ $diary->cast_waist }}
                      H.{{ $diary->cast_hip }}
                    </span>
                  </div>
                </div>

                <span class="diary-contents-slide-item-shop">{{ $diary->shop_name }}</span>
              </a>
            </div>
          @endforeach
        </div>
      </div>

      {{-- More --}}
      <div class="groups-button-more">
      <a href="{{ route('public.groups.movie') }}" class="groups-button-more-btn">もっと見る</a>
    </div>

    </div>
  </div>
</section>
@endif
  @if($displayVideos->count() > 0)
<section class="movie" aria-labelledby="shop-movie-title">
  <!-- <div class="movie-bgs" aria-hidden="true">
    <img class="movie-bgs-bg1" src="{{ asset('assets/img/groups/bg-newface.png') }}" alt="">
  </div> -->

  <div class="container">
    {{-- Heading --}}
    <header class="section-title">
      <h1 id="shop-movie-title" class="section-title-en">Shop Movie</h1>

      <div class="section-title-jp">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 25 18" fill="none" aria-hidden="true" focusable="false">
          <path d="M25 0V18H0V0H25ZM3.78516 1.724C3.58984 1.524 2.16406 1.515 2.00098 1.799C1.92578 1.93 1.91406 3.881 1.94922 4.155C1.96973 4.316 1.9873 4.47 2.14844 4.551C2.38184 4.667 3.64648 4.669 3.80176 4.443C3.96973 4.199 3.97461 1.919 3.78516 1.724ZM21.2148 1.724C21.0244 1.919 21.0312 4.199 21.1992 4.443C21.3545 4.669 22.6191 4.667 22.8525 4.551C23.0137 4.47 23.0312 4.316 23.0518 4.155C23.0859 3.881 23.0752 1.93 23 1.799C22.8359 1.515 21.4092 1.524 21.2148 1.724ZM9.92969 5.113C9.69043 5.24 9.68555 5.503 9.66406 5.745C9.47559 7.877 9.81738 10.291 9.66406 12.454C9.66602 12.783 9.89258 12.947 10.1953 12.899L16.3975 9.236C16.5615 9.007 16.4658 8.766 16.2451 8.614L10.4893 5.21L9.92969 5.112V5.113ZM2.2168 7.32C2.05859 7.368 1.98438 7.494 1.95605 7.653C1.90918 7.909 1.92285 9.835 2.00195 10.001C2.13379 10.279 3.4668 10.273 3.71191 10.151C3.87305 10.07 3.89062 9.916 3.91113 9.755C3.94727 9.467 3.94141 7.675 3.8584 7.5C3.72754 7.224 2.4873 7.239 2.21777 7.321L2.2168 7.32ZM21.3574 7.32C21.1992 7.368 21.125 7.494 21.0967 7.653C21.0498 7.909 21.0635 9.835 21.1426 10.001C21.2744 10.279 22.6074 10.273 22.8525 10.151C23.0137 10.07 23.0312 9.916 23.0518 9.755C23.0879 9.467 23.082 7.675 22.999 7.5C22.8682 7.224 21.6279 7.239 21.3584 7.321L21.3574 7.32ZM3.78516 13.524C3.46289 13.359 2.16016 13.267 2.00098 13.6C1.91797 13.774 1.91113 15.661 1.94824 15.955C1.96875 16.116 1.98633 16.27 2.14746 16.351C2.37012 16.462 3.67578 16.461 3.81543 16.234C3.9668 15.99 3.96973 13.713 3.78516 13.524ZM21.2148 16.276C21.4102 16.476 22.8359 16.485 22.999 16.201C23.0742 16.07 23.0859 14.119 23.0508 13.845C23.0303 13.684 23.0127 13.53 22.8516 13.449C22.6182 13.333 21.3535 13.331 21.1982 13.557C21.0303 13.801 21.0254 16.081 21.2148 16.276Z" fill="#021A21"/>
        </svg>

        <h2 class="section-title-jp-text">各お店の最新動画</h2>
      </div>
    </header>

    {{-- Grid --}}
    <div class="movie-contents" role="list">
      @foreach ($displayVideos as $video)
        <article class="movie-contents-item" role="listitem">
          <figure class="movie-contents-item-figure">
            <video
              class="movie-contents-item-movie"
              controls
              muted
              playsinline
              preload="metadata"
              poster="{{ asset('storage/' . $video->thumb_url) }}"
            >
              <source src="{{ $video->video_url }}" type="video/mp4">
            </video>

            <figcaption class="movie-contents-item-detail">
              <span class="movie-contents-item-detail-date">
                {{ \Carbon\Carbon::parse($video->updated_at)->format('m/d') }} UP
              </span>

              <span class="movie-contents-item-detail-name">{{ $video->name }}</span>

              <span class="movie-contents-item-detail-shop">
                <span class="movie-contents-item-detail-shop-text">{{ $video->shop_name }}</span>
              </span>
            </figcaption>
          </figure>
        </article>
      @endforeach
    </div>

    {{-- More --}}
    <div class="groups-button-more">
      <a href="{{ route('public.groups.movie') }}" class="groups-button-more-btn">もっと見る</a>
    </div>
  </div>
</section>
@endif
  <x-public.groups.footer />

  </div>
</x-public-groups-layout>

@once
  {{-- @vite(['resources/scss/group/_pickup_top.scss','resources/scss/group/diary_top.scss','resources/scss/group/newstop.scss']) --}}
  @vite(['resources/scss/groups/section-title.scss','resources/scss/groups/schedule-content.scss','resources/scss/groups/event-content.scss','resources/scss/groups/newface-content.scss','resources/scss/groups/pickup-content.scss','resources/scss/groups/diary-content.scss','resources/scss/groups/movie-content.scss'])
@endonce
<!-- {{-- <script>
document.addEventListener('DOMContentLoaded', function() {
  const moreButton = document.getElementById('diary_more_button');
  const shopsList = document.querySelector('.diary-content-bottom-shops');

  if (moreButton && shopsList) {
    moreButton.addEventListener('click', function(e) {
      e.preventDefault();
      shopsList.style.display = 'flex';
    });
  }
});
</script> --}} -->

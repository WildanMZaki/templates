arch('check code not use dd and dump')->expect(['dd', 'dump'])->not->toBeUsed();

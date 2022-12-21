<?php

namespace Bluestone\Redmine\Entities;

use Bluestone\DataTransferObject\Attributes\CastWith;
use Bluestone\DataTransferObject\Attributes\Map;
use Bluestone\DataTransferObject\Casters\ArrayCaster;
use DateTime;
use Bluestone\Redmine\Casters\DateTimeCaster;
use Bluestone\DataTransferObject\DataTransferObject;

class Issue extends DataTransferObject
{
    public int $id;

    public ?string $baseUri;

    public ?string $subject;

    public ?string $description;

    public ?Project $project;

    public ?Category $category;

    public ?Tracker $tracker;

    public ?Status $status;

    public ?Issue $parent;

    public ?Priority $priority;

    public ?User $author;

    #[Map('assigned_to')]
    public ?User $assignedTo;

    #[Map('fixed_version')]
    public ?Version $version;

    #[Map('start_date')]
    #[CastWith(DateTimeCaster::class, format: 'Y-m-d')]
    public ?DateTime $startDate;

    #[Map('due_date')]
    #[CastWith(DateTimeCaster::class, format: 'Y-m-d')]
    public ?DateTime $dueDate;

    #[Map('done_ratio')]
    public ?int $doneRatio;

    #[Map('is_private')]
    public ?bool $isPrivate;

    #[Map('estimated_hours')]
    public ?int $estimatedHours;

    #[Map('custom_fields')]
    #[CastWith(ArrayCaster::class, type: CustomField::class)]
    public ?array $customFields;

    #[CastWith(ArrayCaster::class, type: Journal::class)]
    public ?array $journals;

    #[Map('created_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $createdOn;

    #[Map('updated_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $updatedOn;

    #[Map('closed_on')]
    #[CastWith(DateTimeCaster::class)]
    public ?DateTime $closedOn;

    #[CastWith(ArrayCaster::class, type: Relation::class)]
    public ?array $relations;

    #[CastWith(ArrayCaster::class, type: Attachment::class)]
    public ?array $attachments;

    public ?string $note;

    public function getCustomField(string $fieldName): ?CustomField
    {
        if (! $this->customFields) {
            return null;
        }

        $field = array_filter($this->customFields, fn (CustomField $field) => $field->name === $fieldName);

        return array_pop($field);
    }

    public function getAttachmentByName(string $name): ?Attachment
    {
        if (! $this->attachments) {
            return null;
        }

        $attachment = array_filter($this->attachments, fn (Attachment $attachment) => $attachment->filename === $name);

        return array_pop($attachment);
    }

    public function getUrl(): ?string
    {
        if (! $this->baseUri) {
            return null;
        }

        $baseUri = parse_url($this->baseUri);

        return sprintf('%s://%s/issues/%s', $baseUri['scheme'], $baseUri['host'], $this->id);
    }

    public function serialize(): array
    {
        return [
            'subject' => $this->subject,
            'description' => $this->description,
            'project_id' => $this->project?->id,
            'tracker_id' => $this->tracker?->id,
            'category_id' => $this->category?->id,
            'status_id' => $this->status?->id,
            'parent_issue_id' => $this->parent?->id,
            'priority_id' => $this->priority?->id,
            'fixed_version_id' => $this->version?->id,
            'estimated_hours' => $this->estimatedHours,
            'custom_fields' => array_map(fn (CustomField $field) => $field->serialize(), $this->customFields ?? []),
            'notes' => $this->note,
            'start_date' => $this->startDate?->format('Y-m-d'),
            'due_date' => $this->dueDate?->format('Y-m-d'),
        ];
    }
}

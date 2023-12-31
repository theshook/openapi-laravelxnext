/* tslint:disable */
/* eslint-disable */
/**
 * Practice API Documentation
 * Practice API description
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: admin@admin.com
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

import { exists, mapValues } from '../runtime';
import type { PaginationLinksInner } from './PaginationLinksInner';
import {
    PaginationLinksInnerFromJSON,
    PaginationLinksInnerFromJSONTyped,
    PaginationLinksInnerToJSON,
} from './PaginationLinksInner';

/**
 * 
 * @export
 * @interface Pagination
 */
export interface Pagination {
    /**
     * 
     * @type {number}
     * @memberof Pagination
     */
    currentPage?: number;
    /**
     * 
     * @type {string}
     * @memberof Pagination
     */
    firstPageUrl?: string;
    /**
     * 
     * @type {number}
     * @memberof Pagination
     */
    from?: number;
    /**
     * 
     * @type {number}
     * @memberof Pagination
     */
    lastPage?: number;
    /**
     * 
     * @type {string}
     * @memberof Pagination
     */
    lastPageUrl?: string;
    /**
     * 
     * @type {Array<PaginationLinksInner>}
     * @memberof Pagination
     */
    links?: Array<PaginationLinksInner>;
    /**
     * 
     * @type {string}
     * @memberof Pagination
     */
    nextPageUrl?: string | null;
    /**
     * 
     * @type {string}
     * @memberof Pagination
     */
    path?: string;
    /**
     * 
     * @type {number}
     * @memberof Pagination
     */
    perPage?: number;
    /**
     * 
     * @type {string}
     * @memberof Pagination
     */
    prevPageUrl?: string | null;
    /**
     * 
     * @type {number}
     * @memberof Pagination
     */
    to?: number;
    /**
     * 
     * @type {number}
     * @memberof Pagination
     */
    total?: number;
}

/**
 * Check if a given object implements the Pagination interface.
 */
export function instanceOfPagination(value: object): boolean {
    let isInstance = true;

    return isInstance;
}

export function PaginationFromJSON(json: any): Pagination {
    return PaginationFromJSONTyped(json, false);
}

export function PaginationFromJSONTyped(json: any, ignoreDiscriminator: boolean): Pagination {
    if ((json === undefined) || (json === null)) {
        return json;
    }
    return {
        
        'currentPage': !exists(json, 'current_page') ? undefined : json['current_page'],
        'firstPageUrl': !exists(json, 'first_page_url') ? undefined : json['first_page_url'],
        'from': !exists(json, 'from') ? undefined : json['from'],
        'lastPage': !exists(json, 'last_page') ? undefined : json['last_page'],
        'lastPageUrl': !exists(json, 'last_page_url') ? undefined : json['last_page_url'],
        'links': !exists(json, 'links') ? undefined : ((json['links'] as Array<any>).map(PaginationLinksInnerFromJSON)),
        'nextPageUrl': !exists(json, 'next_page_url') ? undefined : json['next_page_url'],
        'path': !exists(json, 'path') ? undefined : json['path'],
        'perPage': !exists(json, 'per_page') ? undefined : json['per_page'],
        'prevPageUrl': !exists(json, 'prev_page_url') ? undefined : json['prev_page_url'],
        'to': !exists(json, 'to') ? undefined : json['to'],
        'total': !exists(json, 'total') ? undefined : json['total'],
    };
}

export function PaginationToJSON(value?: Pagination | null): any {
    if (value === undefined) {
        return undefined;
    }
    if (value === null) {
        return null;
    }
    return {
        
        'current_page': value.currentPage,
        'first_page_url': value.firstPageUrl,
        'from': value.from,
        'last_page': value.lastPage,
        'last_page_url': value.lastPageUrl,
        'links': value.links === undefined ? undefined : ((value.links as Array<any>).map(PaginationLinksInnerToJSON)),
        'next_page_url': value.nextPageUrl,
        'path': value.path,
        'per_page': value.perPage,
        'prev_page_url': value.prevPageUrl,
        'to': value.to,
        'total': value.total,
    };
}

